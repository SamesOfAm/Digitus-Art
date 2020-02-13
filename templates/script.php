<script>
    const fundingBanner = document.querySelector('.funding-banner');
    if(document.querySelector('.interactive-images') !== null) {
        var allModels = document.querySelector('.interactive-images').children[0].children;
        for (let i = 1; i < allModels.length; i++) {
            allModels[i].style.opacity = '0';
        }
        var modelButtons = document.getElementById('model-buttons').children;
        function showModel(){
            for(let i = 0; i < modelButtons.length; i++) {
                if(modelButtons[i].children[0].checked) {
                    allModels[i].style.opacity = '1';
                } else {
                    allModels[i].style.opacity = '0';
                }
            }
        }
        var radioTexts = document.querySelectorAll('.radio-text');
        function switchRadioState() {
            if (!this.children[0].checked) {
                this.children[0].checked = 'true';
                for(let i = 0; i < radioTexts.length; i++) {
                    radioTexts[i].classList.remove('checked');
                    radioTexts[i].classList.add('unchecked');
                }
                this.classList.add('checked');
                this.classList.remove('unchecked');
            }
        }
        document.getElementById('model-buttons').addEventListener("click", showModel);
        for (let i = 0; i < radioTexts.length; i++) {
            radioTexts[i].addEventListener("click", switchRadioState);
        }
        jQuery(document).ready(function(){
            console.log('Ready');
            jQuery(window).scroll(function(){
                let overlay = document.querySelector('.mood-overlay');
                let moodImageTop = document.querySelector('.mood-image').offsetTop;
                let scrolling = jQuery(window).scrollTop();
                let currentWindowHeight = jQuery(window.top).height();
                let eva = document.getElementById('eva').children[0];
                let evaTop = eva.offsetTop;
                overlay.style.top = -(scrolling + currentWindowHeight - moodImageTop)*0.8 + 'px';
                eva.style.top = -(scrolling + (currentWindowHeight/3) - evaTop)*0.2 + 'px';
            });
        });
        jQuery('#funding-image').on("load", function(){
            setTimeout(function() {
                fundingBanner.classList.add('funding-removed');
            }, 5000);
        });
    } else {
        fundingBanner.style.display = "none";
    }
    function closeBanner() {
        fundingBanner.classList.add('funding-removed');
    }
</script>