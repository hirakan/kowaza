<!DOCTYPE html>
<html>
<head>
    <title>どんなサイズ・縦横比の画像でも枠内にぴったりトリミングする方法（しかも中央寄せ）サンプル</title>
    <meta charset="UTF-8">
    <meta name="description" content="どんなサイズ・縦横比の画像でも枠内にぴったりトリミングする方法（しかも中央寄せ）" />
    <meta name="keywords" content="メディアクエリー,media query,css,ブレイクポイント,コーディング,web,xperia,レイアウト崩れ,background-size,レスポンシブ,scss,jquery,html,画像トリミング,画像中央寄せ,画像センタリング,webデザイン" />
</head>
<body>
<div><b>どんなサイズ・縦横比の画像でも枠内にぴったりトリミングする方法（しかも中央寄せ）</b></div>
<div class="main" >
    <div class="photo"><img src="http://blackwhite.sakura.ne.jp/wp/wp-content/uploads/2017/03/RIMG2880.jpg"></div>

    <div class="photo"><img src="http://blackwhite.sakura.ne.jp/wp/wp-content/uploads/2017/03/2014-05-17-15.59.34-676x901.jpg"></div>
    
        <div class="photo"><img src="http://blackwhite.sakura.ne.jp/wp/wp-content/uploads/2017/03/DSC1192-676x449.jpg"></div>
</div>
<div class="main">
<div class="photo2"><img src="http://blackwhite.sakura.ne.jp/wp/wp-content/uploads/2017/03/RIMG2880.jpg"></div>

    <div class="photo2"><img src="http://blackwhite.sakura.ne.jp/wp/wp-content/uploads/2017/03/2014-05-17-15.59.34-676x901.jpg"></div>
    
        <div class="photo2"><img src="http://blackwhite.sakura.ne.jp/wp/wp-content/uploads/2017/03/DSC1192-676x449.jpg"></div>

</div><!--.main-->
<style>	
    .main{clear:both;}
    .main div{float:left;margin:20px;}
.photo{	 	 
 display: block;	 	 
 overflow: hidden;	 	 
 position: relative;	 	 
 width:200px;	 	 
 height: 200px;	 	 
 border-radius:50%;	 	 
 border:5px solid #FFF;	 	 
 box-shadow:3px 3px 3px rgba(0,0,0,0.3);	 	 
}
.photo2{	 	 
 display: block;	 	 
 overflow: hidden;	 	 
 position: relative;	 	 
    width: 220px;
    height: 260px; 

 border:5px solid #FFF;	 	 
 box-shadow:3px 3px 3px rgba(0,0,0,0.3);	 	 
}	 	
 .photo img,.photo2 img{	 	 
 width: 100%;	 	 
 height: auto;	 	 
 position: absolute;	 	 
 top: 50%;	 	 
 left: 50%;	 	 
 -webkit-transform: translate(-50%, -50%);	 	 
 -ms-transform: translate(-50%, -50%);	 	 
 transform: translate(-50%, -50%);
 }
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
$(window).on('load resize', function(){
     trimming('.photo');//ここにトリミングしたい枠を書くだけ（複数指定可能）
     trimming('.photo2');
     trimming('.photo3');

})
function trimming ($photoBox) {    //Functionで機能をまとめ
    jQuery($photoBox).each(function(){
        var box = jQuery(this);
        var i = jQuery('img',this);
        var box_w =$(box).width();
        var box_h =$(box).height();
        var i_w =$(i).width();
        var i_h =$(i).height();
        var i_par =i_w / i_h; //画像の縦横比
        var box_par =box_w / box_h; //画像を包むボックスの縦横比
       //画像の縦横比と枠の縦横比を比べて分岐させ違うトリミングをする
        if (i_par > box_par) { //画像が枠より横長の場合高さ100%で幅左右を切る
            $(i).css({
                "width": "auto",
                "height":"100%"
            });
        }else{
            $(i).css({//画像が枠より縦長または同じの場合幅100%にして高さの上下を切る
                "width": "100%",
                "height":"auto"
            });
        }
    });
}

</script>
</body>
</html>