	<script type="text/javascript">
		var byline = document.getElementById('byline');
		bylineText = byline.innerHTML;
		bylineArr = bylineText.split('');
		byline.innerHTML = '';

		var span;
		var letter;

		for(i=0;i<bylineArr.length;i++){
			span = document.createElement("span");
			letter = document.createTextNode(bylineArr[i]);
			if(bylineArr[i] == ' ') {
				byline.appendChild(letter);
			} else {
				span.appendChild(letter);
				byline.appendChild(span);
			}
		}
	</script>
	<script src="<?= base_url('assets/page-themes/js/plugins/animate-headline.js');?>"></script>
	<script src="<?= base_url('assets/page-themes/js/main.js');?>"></script>
</body>
</html>