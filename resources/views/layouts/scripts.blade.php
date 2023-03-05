<script src="{{ URL::asset('js/jquery.min.js')}}"></script>
<script>

    function assetPath(path){
        return $("meta[name=asset-path]").attr('content') + path;
    }

    function getToken(){
        return $("meta[name=csrf-token]").attr('content');
    }

</script>