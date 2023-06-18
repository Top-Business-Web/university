<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('selections.update', $selection->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $selection->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label for="name" class="form-control-label">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $selection->name }}">
                </div>
            </div>
        </div>
        <div class="row">
            <label for="name" class="form-control-label">Options</label>
            <div class="form-group col-12 itemItems">
                @foreach ($selection->details as $option)
                <input type="text" name="details[]" value="{{ $option }}" required class="form-control InputItemExtra mt-3">
                @endforeach
            </div>
            <div class="col-md-6 mb-3">
                <button type="button" class=" mt-5 btn btn-primary MoreItem">+</button>
                <button type="button" class=" mt-5 btn btn-danger delItem">-</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <span class="Issue badge badge-danger"></span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-success" id="updateButton">{{ trans('admin.update') }}</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()
</script>

<script>
    $(document).on('click', '.delItem', function () {
        var Item = $('.InputItemExtra').last();
        if (Item.val() == '') {
            Item.fadeOut();
            Item.remove();
            $('.Issue').html('The element deleted');
            setTimeout(function () {
                $('.Issue').html('');
            }, 3000)
        } else {
            setTimeout(function () {
                $('.Issue').html('');
            }, 3000)

        }
    })

    $(document).on('click', '.MoreItem', function () {
        var Item = $('.InputItemExtra').last();
        if (Item.val() !== '') {
            $('.itemItems').append(
                '<input type="text" name="details[]" class="form-control InputItemExtra mt-3" required>')
        }
    })
</script>
