<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function(){
setInterval(function(){
$("#screen").load('new.php')
}, 1000);
});

</script>

<style type="text/css">

.abcd
 {
  width: 800px;
  height: 480px;
}

input[type="button"]
{

    display:block;
    border: none;
    outline:none;
}
input[type="submit"]
{

    display:block;
    border: none;
    outline:none;
}
input[type="text"]
{

    display:block;
    border: none;
    outline:none;
}
</style>

<div id="screen"></div>
