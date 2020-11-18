window.onload=function(){	
            var el       = document.querySelector('.main-text')
            var options  = {
                text: '안 녕 하 세 요 ! \n 꽃 을 - 피 우 는 \n 웹 퍼 플 리 셔 & 프 론 트 엔 드 \n  임 세 화 의 - 포 트 폴 리 오 입 니 다 .',
          textSpeed: 95,
          blinkSpeed: 0.06
            }

            var instance = new tinytyper(el, options);}