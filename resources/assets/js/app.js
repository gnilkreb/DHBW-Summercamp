import './parallax';
import './script';
import './levels';
import './file-input';
import './files';
import './options';
import './requests';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});