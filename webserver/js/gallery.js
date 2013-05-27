$(document).ready(function() {
	$(".fancybox")
	.attr('rel', 'gallery')
	.fancybox({
		'arrows' : false,
		'closeBtn' : false,
		beforeLoad: function() {
			this.title = $(this.element).attr('caption');
		}
	});
});

$(document).ready(function() {
	$("#keyinput").focus();
});

function deleteFile(filename)
{	
	if(confirm('Are you sure you want to delete '+filename+' ?\nThis can only be undone manually')) { 
		window.location.href = 'trash.php?f='+filename;
	}
}