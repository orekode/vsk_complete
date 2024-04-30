<div class="loader_12">
    <div class="center_12" style="height: var(--size); width: var(--size); --size: 500px;">
        <img src="./images/loading.gif"  class="obj-cover_12 hw_12"/>
    </div>
    <div class="center_12 abs-center" style="height: var(--size); width: var(--size); --size: 150px;">
        <img src="./images/graduation-cap.svg"  class="obj-cover_12 hw_12"/>
    </div>
</div>


<?php if(!isset($stoploading)): ?>

<script>
    function stoploading() {
        document.querySelector(".vsk_root .loader_12").style.opacity = 0;
        setTimeout(() => {
            document.querySelector(".vsk_root .loader_12").style.display = "none";
        }, 300);
    }

    if(document.readyState === 'ready' || document.readyState === 'complete') {
        stoploading();
    } else {
        document.onreadystatechange = function () {
            if (document.readyState == "complete") {
                stoploading();
            }
        }
    }
</script>

<?php endif; ?>