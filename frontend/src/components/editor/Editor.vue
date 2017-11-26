<template>
<section>
    <div class="home">
  <div class="container-fluid bg">
        <div class="row editorss">
            <div class="border-try col-sm-4 col-md-4 ">
                <div class="border-try1 ">
                    <h2>HTML</h2>
                    <textarea class="codes" id="html" placeholder="Your HTML Code HERE"></textarea>
                </div>
            </div>
            <div class="border-try col-sm-4 col-md-4 ">
                <div class="border-try1">
                    <h2>CSS</h2>
                    <textarea class="codes" id="css" placeholder="Your CSS Code HERE"></textarea>
                </div>
            </div>
            <div class="border-try col-sm-4 col-md-4 ">
                <div class="border-try1">
                    <h2>JS</h2>
                    <textarea class="codes" id="js" placeholder="Your JavaScript Code HERE"></textarea>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <iframe id="preview" src="javascript:;"></iframe>
                <!--<input id="upjs" type="button" value="Update And Run JS" />-->
            </div>
        </div>
    </div>
    </div>
    <router-link class="nav-item" to="/evaluation">
                  <a class="nav-link" href="">Save and Submit</a>
              </router-link>
</section>
</template>

<script>
export default {
  
  ready: function() {
      this.$nextTick(function () {
    var p = $("#preview").contents().find("section");
    p.css("margin", "2px");
    p.html('<span id="subinsbdotcomhtmlpr"></span><style id="subinsbdotcomcsspr"></style>');
    $("#html").on('keyup', function() {
        p.find("#subinsbdotcomhtmlpr").html($(this).val());
    });
    $("#css").on('keyup', function() {
        p.find("#subinsbdotcomcsspr").html($(this).val());
    });
    $("#js").on('change', function() {
        p.find("#subinsbdotcomjspr").remove();
        p.append('<script id="subinsbdotcomjspr">' + $(this).val() + '</script>');
    });
    $("#upjs").on('click', function() {
        p.find("#subinsbdotcomjspr").remove();
        p.append('<script id="subinsbdotcomjspr">' + $("#js").val() + '</script>');
    });
      });
}

}
</script>
<style>


</style>
