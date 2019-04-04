<template>
    <div class="male-hashtag">
        <h1 class="text-center"><a href="https://twitter.com/hashtag/laravel" target="_black">#Laravel</a></h1>
        <div class="count" id="male-count">
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <div class="clear"></div>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                laravel: "",
                water_height: ""
            }
        },
        created() {
            this.getCount();
            setInterval(this.getCount, 1000);
        },
        methods: {
            setWaterHeight(height) {
              let elem = document.getElementById('male-whole-water');
              elem.style.height = height + '%';
            },
            dropAnim() {
              let elem = document.getElementById('male-drop');
              elem.style.display = 'block';
              elem.classList.add('drop-anim');
              setTimeout(function(){
                elem.classList.remove('drop-anim');
                elem.style.display = 'none';
              },2000);
            },
            getCount() {
                let base_url = document.getElementById('base_url').value;
                let uri = base_url+'api/count_hastag1';
                this.axios.get(uri).then(response => {
                    if( this.laravel != response.data.laravel ) {
                      this.laravel = response.data.laravel;
                      this.water_height = this.laravel/2941;
                      this.setWaterHeight(this.water_height);
                      this.counter();
                      this.dropAnim();
                    }
                })
            },
            counter() {
                let tags = document.querySelectorAll('#male-count > ul > li');
                let items = [];
                tags.forEach(function(item, i){
                    items[i] = tags[i];
                })
                items = items.reverse();
                let reversedArr = (this.laravel+'').split('').reverse();
                items.forEach(function(item, i){
                    setTimeout(function(){
                        let className = 'd' + reversedArr[i] || 0;
                        item.className = className;
                    }, i * 350);
                })
            }
        }
    }
</script>

<style scoped>
@media (min-width: 320px) {
  .count > ul > li:before {
    content: ' 0 1 2 3 4 5 6 7 8 9 ';
    display: block;
    line-height: 25px;
    word-break: break-all;
    word-break: break-word;
    transition: 0.7s cubic-bezier(0.12, 0.78, 0.52, 1.2);
    font-weight: bold;
    text-shadow: 0 1px 0 #ccc,
                0 2px 0 #c9c9c9,
                0 1px 0 #bbb,
                0 0px 0 #b9b9b9,
                0 0px 0 #aaa,
                0 6px 1px rgba(0,0,0,.1),
                0 0 5px rgba(0,0,0,.1),
                0 1px 3px rgba(0,0,0,.3),
                0 3px 5px rgba(0,0,0,.2),
                0 5px 10px rgba(0,0,0,.25),
                0 10px 10px rgba(0,0,0,.2),
                0 20px 20px rgba(0,0,0,.15);
  }
  .count > ul > li.d1:before {
    margin-top: -25px;
  }
  .count > ul > li.d2:before {
    margin-top: -50px;
  }
  .count > ul > li.d3:before {
    margin-top: -75px;
  }
  .count > ul > li.d4:before {
    margin-top: -100px;
  }
  .count > ul > li.d5:before {
    margin-top: -125px;
  }
  .count > ul > li.d6:before {
    margin-top: -150px;
  }
  .count > ul > li.d7:before {
    margin-top: -175px;
  }
  .count > ul > li.d8:before {
    margin-top: -200px;
  }
  .count > ul > li.d9:before {
    margin-top: -225px;
  }
}

@media (min-width: 400px) {
  .count > ul > li:before {
    content: ' 0 1 2 3 4 5 6 7 8 9 ';
    display: block;
    line-height: 30px;
    word-break: break-all;
    word-break: break-word;
    transition: 0.7s cubic-bezier(0.12, 0.78, 0.52, 1.2);
    font-weight: bold;
    text-shadow: 0 1px 0 #ccc,
                0 2px 0 #c9c9c9,
                0 3px 0 #bbb,
                0 0px 0 #b9b9b9,
                0 0px 0 #aaa,
                0 6px 1px rgba(0,0,0,.1),
                0 0 5px rgba(0,0,0,.1),
                0 1px 3px rgba(0,0,0,.3),
                0 3px 5px rgba(0,0,0,.2),
                0 5px 10px rgba(0,0,0,.25),
                0 10px 10px rgba(0,0,0,.2),
                0 20px 20px rgba(0,0,0,.15);
  }
  .count > ul > li.d1:before {
    margin-top: -30px;
  }
  .count > ul > li.d2:before {
    margin-top: -60px;
  }
  .count > ul > li.d3:before {
    margin-top: -90px;
  }
  .count > ul > li.d4:before {
    margin-top: -120px;
  }
  .count > ul > li.d5:before {
    margin-top: -150px;
  }
  .count > ul > li.d6:before {
    margin-top: -180px;
  }
  .count > ul > li.d7:before {
    margin-top: -210px;
  }
  .count > ul > li.d8:before {
    margin-top: -240px;
  }
  .count > ul > li.d9:before {
    margin-top: -270px;
  }
}

@media (min-width: 768px) {
  .count > ul > li:before {
    content: ' 0 1 2 3 4 5 6 7 8 9 ';
    display: block;
    line-height: 45px;
    word-break: break-all;
    word-break: break-word;
    transition: 0.7s cubic-bezier(0.12, 0.78, 0.52, 1.2);
    font-weight: bold;
    text-shadow: 0 1px 0 #ccc,
                0 2px 0 #c9c9c9,
                0 3px 0 #bbb,
                0 0px 0 #b9b9b9,
                0 0px 0 #aaa,
                0 6px 1px rgba(0,0,0,.1),
                0 0 5px rgba(0,0,0,.1),
                0 1px 3px rgba(0,0,0,.3),
                0 3px 5px rgba(0,0,0,.2),
                0 5px 10px rgba(0,0,0,.25),
                0 10px 10px rgba(0,0,0,.2),
                0 20px 20px rgba(0,0,0,.15);
  }
  .count > ul > li.d1:before {
    margin-top: -45px;
  }
  .count > ul > li.d2:before {
    margin-top: -90px;
  }
  .count > ul > li.d3:before {
    margin-top: -135px;
  }
  .count > ul > li.d4:before {
    margin-top: -180px;
  }
  .count > ul > li.d5:before {
    margin-top: -225px;
  }
  .count > ul > li.d6:before {
    margin-top: -270px;
  }
  .count > ul > li.d7:before {
    margin-top: -315px;
  }
  .count > ul > li.d8:before {
    margin-top: -360px;
  }
  .count > ul > li.d9:before {
    margin-top: -405px;
  }
}

</style>