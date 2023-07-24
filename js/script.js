// event pada saat link di klik
$('.page-scroll').on('click', function(e){

		// ambil isi href
		var tujuan = $(this).attr('href');
		//tangkap element ybs
		var elemenTujuan = $(tujuan);
		

		// pindahkan scroll 
		$('body').animate({
				scrollTop: elemenTujuan.offset().top -50

		}, 1000, 'swing');

		e.preventDefault();

});

var ruwet = documnet.getElementById('ruwet',function()

window.addEventListener('load', function() {
	loading.style.display="none";
});
