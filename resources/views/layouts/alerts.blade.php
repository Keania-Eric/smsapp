@if(Session::has('success'))
    <script>
       var notice = new PNotify({
			title: 'Success',
			text: "{{Session::get('success')}}",
			type: 'success',
			addclass: 'click-2-close',
			hide: false,
			buttons: {
				closer: false,
				sticker: false
			}
		});

		notice.get().click(function() {
			notice.remove();
		});
    </script>
@endif

@if(Session::has('failure'))
    <script>
        var notice = new PNotify({
			title: 'Error',
			text: "{{Session::get('failure')}}",
			type: 'error',
			addclass: 'click-2-close',
			hide: false,
			buttons: {
				closer: false,
				sticker: false
			}
		});

		notice.get().click(function() {
			notice.remove();
		});
    </script>
@endif
