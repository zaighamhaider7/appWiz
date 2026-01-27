<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Subscription;
use App\Models\SubscriptionFeature;


class marketplaceController extends Controller
{
    public function marketplaceView()
    {
        $mainCategories = Category::where('is_sub', 0)->get();

        $subscriptions = [];
        foreach ($mainCategories as $main) {
            $subscriptions[$main->id] = Subscription::where('main_category', $main->id)->get();
        }

        $subCategories = Category::where('is_sub', 1)->get();

        $currentUser = auth()->user();

        if ($currentUser->role_id == 1) {
            $view = 'admin.marketplace';
        } else {
            $view = 'user.marketplace';
        }

        return view($view, compact('mainCategories', 'subCategories', 'subscriptions'));
    }



    public function subscriptionStore(request $request){

        $validated = $request->validateWithBag('subscriptionError',[
            'subscription_tag' => 'required|string|max:255',
            'price' => 'required|numeric',
            'subscription_name' => 'required|string|max:255',
            'tagline' => 'required|string|max:255',
            'best_for' => 'required|string|max:255',
            'main_category' => 'required|integer',
            'sub_category' => 'nullable',
            'features' => 'required|array|min:1',
            'features.*' => 'nullable|string|max:255',
        ]);

        $subscription = new Subscription();
        $subscription->subscription_tag = $validated['subscription_tag'];
        $subscription->price = $validated['price'];
        $subscription->subscription_name = $validated['subscription_name'];
        $subscription->tagline = $validated['tagline'];
        $subscription->best_for = $validated['best_for'];
        $subscription->main_category = $validated['main_category'];
        $subscription->sub_category = $validated['sub_category'];
        $subscription->save();

        $features = array_filter($validated['features']);

        foreach ($features as $feature) {
            SubscriptionFeature::create([
                'subscription_id' => $subscription->id,
                'feature' => $feature,
            ]);
        }

        return redirect()->back()->with('AddSubscription', 'Subscription  added successfully!');

    }

    public function subscriptionDelete(Request $request){

        $sub_id = $request->id;
        $sub = Subscription::findOrFail($sub_id);
        $sub->delete();
        return response()->json([
            "subDelete" => 'Subscription deleted successfully.',
        ]);
    }

    public function subscriptionDetail(Request $request){

        $sub_id = $request->id;

        $sub = Subscription::with('features')->findOrFail($sub_id);

        return response()->json([
            "subDetail" => $sub
        ]);
    }

    public function subscriptionedit(Request $request){

        $sub_id = $request->id;

        $sub = Subscription::with(['features','mainCategory','subCategory'])->findOrFail($sub_id);

        return response()->json([
            "subedit" => $sub
        ]);
    }

    public function subscriptionupdate(Request $request){
        $sub_id = $request->id;
        $subscription = Subscription::findOrFail($sub_id);
        $subscription->subscription_tag = $request->subscription_tag;
        $subscription->price = $request->price;
        $subscription->subscription_name = $request->subscription_name;
        $subscription->tagline = $request->tagline;
        $subscription->best_for = $request->best_for;
        $subscription->main_category = $request->main_category;
        $subscription->sub_category = $request->sub_category ?: null;
        $subscription->save();
        // Update features
        $subscription->features()->delete();
        $features = array_filter($request->features);
        foreach ($features as $feature) {
            SubscriptionFeature::create([
                'subscription_id' => $subscription->id,
                'feature' => $feature,
            ]);
        }
        return response()->json(
            [
                "UpdateSubscription" => "Subscription updated successfully!",
                "subscription" => $subscription,
            ]
        );
    }


    // category

    public function categoryStore(request $request){
        $validated = $request->validateWithBag('categoryError',[
            'is_sub' => 'required|in:0,1',
            'category_name' => 'required|string|max:255',
            'category_icon' => 'required_if:is_sub,0|file|mimes:jpg,png,jpeg,svg,gif|max:2048',
            'parent_id' => 'required_if:is_sub,1|nullable|integer'
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->is_sub = $request->is_sub; 

        if ($request->hasFile('category_icon')) {

            $file = $request->file('category_icon');

            $filename = time() . '_' . $file->getClientOriginalName();
            
            $file->move(public_path('categoryAssets'), $filename);

            $category->category_icon = 'categoryAssets/' . $filename;
        }

        $category->save();

        return redirect()->back()->with('AddCategory', 'Subscription Category added successfully.');
    }
}
