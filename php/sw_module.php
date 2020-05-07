<script type="module">
		import { Workbox } from './js/workbox-window.prod.mjs';
		if ('serviceWorker' in navigator) {
			const wb = new Workbox('/service-worker.js');
			wb.addEventListener('waiting', (event) => {
				createUIPrompt('Updated information avialable', 'Load');
				document.getElementsByClassName("closebtn")[0].addEventListener('click', (event) => {
					wb.addEventListener('controlling', (event) => {
						window.location.reload()
					});
					wb.messageSW({ type: 'SKIP_WAITING' });
				});
			});
			wb.register();
		}
	</script>