window.livewire.on('submitForm', form => {
    $('#' + form).submit();
})

$('body').on('change', 'input[type=file]', function(){
	let imgTag = 'img.' + $(this).attr('name') + '-preview';
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(imgTag).attr('src', e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    }
})