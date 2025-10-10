<style>
/* loader CSS here so it applies instantly */
#page-loader {
  position: fixed;
  inset: 0;
  z-index: 99999;
  display: flex;
  align-items: center;
  justify-content: center;
  /* background: linear-gradient(180deg, rgba(255,255,255,0.95), rgba(250,246,244,0.95)); */
  background: linear-gradient(180deg, rgba(32, 32, 32, 0.977), rgba(30, 30, 29, 0.977));
  backdrop-filter: blur(3px);
  transition: opacity 450ms ease, visibility 450ms ease;
  opacity: 1;
  visibility: visible;
}
.page-loader-inner {
  display: flex;
  flex-direction: column;
  gap: 10px;
  align-items: center;
  padding: 18px 24px;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08);
  /* background: rgba(255,255,255,0.85); */
  background: #000000da
}
.page-spinner {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  border: 6px solid #fff;
  border-top-color: #ff7a00;
  animation: spin 900ms linear infinite;
}
.page-loader-text strong { display:block; color:#fff; font-size:1rem; }
.page-loader-sub { font-size:0.85rem; color:#fff; margin-top:4px; }
#page-loader.hidden { opacity: 0; visibility: hidden; pointer-events: none; }
@keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
</style>


  <div id="page-loader">
    <div class="page-loader-inner">
      <div class="page-spinner"></div>
      <div class="page-loader-text">
        <strong>Preparing dashboard</strong>
        <div class="page-loader-sub">Loading resources — please wait…</div>
      </div>
    </div>
  </div>
  
  

  <script>
    window.addEventListener('load', () => {
      const loader = document.getElementById('page-loader');
      setTimeout(() => {
        loader.classList.add('hidden');
      }, 400);
    });
  </script>