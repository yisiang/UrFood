<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./materialize/css/materialize.css" type="text/css" />
        <link rel="stylesheet" href="./js/jquery.mobile.css" type="text/css" />
        <style>
            .ui-controlgroup-controls{
                width:100%;
            }
            .ui-radio {
                width:50%;
            }
            .ul-li-p {
                text-align: right;
            }
            .custom-count-pos {
                font-size: 11px;
                font-weight: bold;
                padding: 0.2em 0.5em;
                float: right;
            }
            .map-btn {
                position: absolute;
                margin-right: 0;
            }
            #rdmDiv {
                margin: 30px;
                text-align: left;
            }
            #photo {
                display: none;
            }
            img {
                width: 100%;
                height: auto;
            }

        </style>
    </head>
    <body>

        <div data-role="page" id="homePage" data-theme="b">
            <div data-role="header">
                <h1>UrFood</h1>
            </div>

            <div data-role="content">
                <div>
                    <a href="#rdmFood" data-role="button">隨便(Random)</a>
                </div>
                <hr>
                <div data-role="controlgroup" data-type="horizontal" >
                    <input type="radio" name="homeGroup" id="loctHome" value="1" checked>
                    <label for="loctHome">家</label>
                    <input type="radio" name="homeGroup" id="loctCompany" value="2">
                    <label for="loctCompany">公司</label>
                </div>                           

                <div data-role="popup" id="popupDialog" data-overlay-theme="a" data-theme="b" data-dismissible="false" style="max-width:400px;">
                    <div data-role="header">
                        <h1>刪除店家</h1>
                    </div>
                        <div data-role="content">
                                <p>您是否確定刪除?</p>
                                <a href="#" id="delete" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back" >確定</a>
                                <a href="#" id="cancel" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">取消</a>
                            </div>
                </div>             


                <div data-role="collapsible-set" >
                    <div data-role="collapsible" id="cop1">
                        <h1><div class="ui-btn-up-c ui-btn-corner-all custom-count-pos" id="firstCount"></div>
                            早餐
                        </h1>
                        <ul data-role="listview" data-filter="true" id="mealList1">

                        </ul>
                    </div>
                    <div data-role="collapsible" id="cop2">
                        <h1><div class="ui-btn-up-c ui-btn-corner-all custom-count-pos" id="secondCount"></div>
                            午、晚餐
                        </h1>
                        <ul data-role="listview" data-filter="true" id="mealList2">          

                        </ul>
                    </div>
                </div>
            </div>


        </div>
        <!------------------------ end of homePage------------------------>

        <div data-role="page" id="menuPage" data-theme="b">

            <div data-role="header" id="menuHead">
            </div>

            <div data-role="content" id="menuContent">


                <!--                 <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-carousel"> -->
                <!--                     <div class="slides"></div> -->
                <!--                     <h3 class="title"></h3> -->
                <!--                     <a class="prev">‹</a> -->
                <!--                     <a class="next">›</a> -->
                <!--                     <a class="play-pause"></a> -->
                <!--                     <ol class="indicator"></ol> -->
                <!--                 </div> -->
            </div>
        </div>
        <!------------------------ end of menuPage------------------------>

        <div data-role="page" id="newStore" data-theme="b"> 
            <div data-role="header">
                <h1>新增店家</h1> 
            </div> 
            <div data-role="content"> 

                <form method="POST" id="newForm" enctype="multipart/form-data"> 
                    <label for="newName"><strong>店名: </strong></label> 
                        <input type="text" name="newName" id="newName" /> 
                    <label for="newAddr"><strong>地址:</strong></label> 
                        <input type="text" name="newAddr" id="newAddr" /> 
                    <label for="newTel"><strong>電話:</strong></label> 
                        <input type="tel" name="newTel" id="newTel" /> 

                    <label for="newImage"><strong>選擇菜單照片:</strong></label> 
                    <div class="ui-grid-a"> 
                        <div class="ui-block-a" id="newFileUpload"> 
                            <input type="file" name="newUpload[]" id="newImage" /> 
                        </div> 
                        <div class="ui-block-b"> 
                            <a href="#" data-role="button" data-icon="plus"  
                            data-iconpos="notext" id="addCol" ></a> 
                        </div> 
                    </div> 

                    <div data-role="controlgroup"> 
                        <legend><strong>群組:</strong></legend> 
                        <input type="radio" name="newGroup" value="1" id="newRdHome" checked /> 
                        <label for="newRdHome">家</label> 
                        <input type="radio" name="newGroup" value="2" id="newRdConp" /> 
                        <label for="newRdConp">公司</label> 
                    </div> 
                    <div data-role="controlgroup"> 
                        <legend><strong>餐別:</strong></legend> 
                        <input type="radio" name="newMeal" value="1" id="newRdBre" checked /> 
                        <label for="newRdBre">早餐</label> 
                        <input type="radio" name="newMeal" value="2" id="newRdDin" /> 
                        <label for="newRdDin">午、晚餐</label> 
                    </div> 
                    <input type="submit" value="確定" /> 
                </form> 

            </div> 
        </div> 
        <!------------------------ end of newStore------------------------>

        <div data-role="page" id="editStore" data-theme="b"> 
            <div data-role="header" > 
                <h1>修改店家</h1> 
            </div> 
            <div data-role="content"> 
                <div> 
                    <label for="editName"><strong>店名: </strong></label> 
                        <input type="text" name="editName" id="editName" /> 
                    <label for="editAddr"><strong>地址:</strong></label> 
                        <input type="text" name="editAddr" id="editAddr" /> 
                    <label for="editTel"><strong>電話:</strong></label> 
                        <input type="tel" name="editTel" id="editTel" /> 

<!--                    <label for="editImage"><strong>選擇菜單照片:</strong></label> 
                    <div class="ui-grid-a"> 
                        <div class="ui-block-a" id="editFileUpload"> 
                            <input type="file" name="newUpload[]" id="editImage" /> 
                        </div> 
                        <div class="ui-block-b"> 
                            <a href="#" data-role="button" data-icon="plus"  
                            data-iconpos="notext" id="editCol" ></a> 
                        </div> 
                    </div> -->
                </div> 
                <input type="button" name="editBtn" id="editBtn" value="確定" /> 
            </div> 
        </div> 
        <!------------------------ end of editStore------------------------>

        <div data-role="page" id="rdmFood" data-theme="b">
            <div data-role="header">
                <h1>隨便(Random)</h1>
            </div>
            <div data-role="content">
                <div data-role="controlgroup" data-type="horizontal">
                    <input type="radio" name="rdmGroup" id="rdmHome" value="1" checked />
                    <label for="rdmHome">家</label>
                    <input type="radio" name="rdmGroup" id="rdmCompany" value="2" />
                    <label for="rdmCompany">公司</label>
                </div>
                <div data-role="controlgroup" data-type="horizontal">
                    <input type="radio" name="rdmMeal" id="rdmBre" value="1" checked />
                    <label for="rdmBre">早餐</label>
                    <input type="radio" name="rdmMeal" id="rdmDin" value="2" />
                    <label for="rdmDin">午、晚餐</label>
                </div>
                <input type="button" id="rdmBtn" value="GO" />   
                <div id="rdmDiv">
                    <canvas id="rdmCanvas" width="300" height="100" ></canvas>
                    <img src="./images/animation.png" id="photo">
                </div>
            </div>
        </div>


        <!------------------------ end of rdmFood------------------------>


        <div data-role="page" id="map" data-theme="b">
            <div data-role="header">
                <h1>地圖</h1>
                <a href="#homePage" data-role="button" class="ui-btn-right" data-icon="home">首頁</a>
            </div>
            <div data-role="content" id="ctnMap">
                <div id="googleMap" style="width: 100%; height: 400px;"></div>
            </div>
        </div>
        <!------------------------ end of map------------------------>


<!--         <script type="text/javascript" src="./js/jquery.js"></script> -->
        <script type="text/javascript" src="./js/jquery-1.9.1.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf9nmPA1GSaC34tsm4ewtPLna_Cpas6m0"></script>
        <script type="text/javascript" src="./materialize/js/materialize.js"></script>
        <script type="text/javascript" src="./js/jquery.tmpl.min.js"></script>
        <script>
            $(document).on("mobileinit", function () {

                $.mobile.toolbar.prototype.options.addBackBtn = true;
                $.mobile.toolbar.prototype.options.backBtnText = "上一頁";

            });

        </script>
        <script type="text/javascript" src="./js/jquery.mobile.js"></script>

       	<script>
                var editID;

                //homePage的事件定義
                $(document).on("pageinit", "#homePage", function () {
                    storeCnt();
                   
                    //群組變更collapsible收合
                    $("input[name='homeGroup']").on("change", function () {
                        $("div[data-role='collapsible']").collapsible("collapse");
                        storeCnt();
                    });
                    
                    //查詢商店資料
                    $("div[data-role='collapsible']").collapsible({
                        //展開
                        expand: function () {

                            var mID = $(this).prop("id") == "cop1" ? 1 : 2;

                            var plus = "<div class='fixed-action-btn'>" +
                                    "<a href='#newStore' class=\"btn-floating waves-effect waves-light blue\">" +
                                    "<i class='material-icons'>+</i>" +
                                    "</a>" +
                                    "</div>";

                            if (mID == 1) {
                                $.tmpl(plus).appendTo("#mealList1");
                            } else {
                                $.tmpl(plus).appendTo("#mealList2");
                            }
                            $.mobile.loading("show");
                            $.ajax({
                                url: './urFoodAPI.php',
                                type: 'POST',
                                datatype: 'JSON',
                                data: {
                                    func: "selectStoreData",
                                    homeGroup: $("input[name='homeGroup']:checked").val(),
                                    meal: mID
                                },
                                success: function (response) {
                                    $.mobile.loading("hide");
                                    var storeData = $.parseJSON(response);
                                    var template = "<li id='${id}'><a href='#'" +
                                            "<h1>${name}</h1>" +
                                            "<p class='ui-li-aside'><strong>${telphone}</strong></p>" +
                                            "<p class='ul-li-p'>${address}</p>" +
                                            "</a></li>";
                                    $.each(storeData, function (i, item) {
                                        if (mID == 1) {
                                            $.tmpl(template, item).appendTo("#mealList1").trigger("create");
                                            $("#mealList1").listview("refresh");
                                        } else {
                                            $.tmpl(template, item).appendTo("#mealList2").trigger("create");
                                            $("#mealList2").listview("refresh");
                                        }

                                    });
                                }
                            });
                            //--- end of $.ajax

                            //選擇商店進入menuPage
                            $(this).on("click", "ul li", function () {
                                if ($.trim($("#menuHead").html()) == "" && $.trim($("#menuContent").html()) == "") {
                                    showMenu($(this).prop("id"));
                                }
                            });
                            //長按修改商店進入editStorePage
                            $(this).on("taphold", "ul li", function () {
                                editID = $(this).prop("id");
                                $.mobile.changePage("#editStore");
                                
                                $.ajax({
                                   url: './urFoodAPI.php',
                                   type: 'POST',
                                   datatype: 'JSON',
                                   data: {
                                       func: "selectStoreMenu",
                                       id: editID
                                   },
                                   success: function (response) {
                                       var data = $.parseJSON(response);
                                       if ( data[0].toString() != "NO DATA" )
                                       {
                                           $("#editName").val( data[0].name );
                                           $("#editAddr").val( data[0].address );
                                           $("#editTel").val( data[0].telphone ); 
                                       }
                                   }
                                });
// 		                $.mobile.changePage("./editStorePage.php?id="+ id);
//                                location.href = "./editStorePage.php?id=" + id;
                            });
                            //滑動刪除
                            $(this).on("swipe", "ul li", function () {
                                var Id = $(this).prop("id");
                                $("#popupDialog").popup("open");
                                $("#delete").on("click", function () {
                                    $.mobile.loading("show");
                                    $.ajax({
                                        url: './urFoodAPI.php',
                                        type: 'POST',
                                        datatype: 'JSON',
                                        data: {
                                            func: "deleteStore",
                                            id: Id
                                        },
                                        success: function (response) {
                                            storeCnt();
                                            $.mobile.loading("hide");
                                            $("li[id=" + Id + "]").remove();
                                        }
                                    });
                                });

                            });
                        },
                        //--- end of expand
                        //收合
                        collapse: function () {
                            $("ul[data-role='listview']").empty();
                            $(this).off("click");
                            $(this).off("taphold");
                            $(this).off("swipe");
                        }
                        //--- end of collapse
                    });
                });
                
                //查詢餐別商店數目
                function storeCnt() {

                    $("#firstCount").empty();
                    $("#secondCount").empty();
                    $.ajax({
                        url: './urFoodAPI.php',
                        type: 'POST',
                        datatype: 'JSON',
                        data: {
                            func : "selectStoreCount",
                            homeGroup: $("input[name='homeGroup']:checked").val()
                        }, //key不能引號
                        success: function (response) {
                            var count = $.parseJSON(response);
                            $("#firstCount").html(count[0].cnt1);
                            $("#secondCount").html(count[0].cnt2);
                            //$("#test").html(response);
                        }
                    });
                }
                
                //清除menuPage資料
                $("#homePage").on("pageshow", function () {
                    $("#menuHead").empty();
                    $("#menuContent").empty();
                    storeCnt();
//                    $("#mealList1").listview("refresh");
                });
                
                //顯示商店菜單
                function showMenu(strID) {
                    $.mobile.loading("show");
                    $.ajax({
                        url: './urFoodAPI.php',
                        type: 'POST',
                        datatype: 'JSON',
                        data: {
                            func: "selectStoreMenu",
                            id: strID
                        },
                        success: function (response) {
                            $.mobile.loading("hide");

                            $("#menuHead").empty();
                            $("#menuContent").empty();

                            var storeData = $.parseJSON(response);
                            var template = "<a href='#' data-role='button' data-icon='carat-l' data-rel='back' " +
                                    "class=\"ui-link ui-btn-left ui-btn ui-icon-carat-l ui-btn-icon-left ui-shadow ui-corner-all\">上一頁</a>" +
                                    "<h1 class='ui-title' role='heading'>${name}</h1>" +
                                    "<div data-role='controlgroup' class='ui-btn-right' data-type='horizontal'>" +
                                    "<a href=\"tel:${telphone}\" data-role='button' data-icon='phone' data-iconpos='notext'></a>" +
                                    "<a href='#map' data-role='button' data-icon='location' data-iconpos='notext' id='gMap' onclick=selectAddr(" + strID + ")></a>" +
                                    "</div>";
                            console.log(storeData);
                            var arrayImg = storeData[0].image.split(";");
                            $.tmpl(template, storeData).appendTo("#menuHead").trigger("create");
                            $.each(arrayImg, function (i, item) {
                                $.tmpl("<img src=" + "'" + item + "'>").appendTo("#menuContent").trigger("create");
                            });
                            $.mobile.changePage("#menuPage");
                        }
                    });
                }

                //查詢店家地址
                function selectAddr(strID) {
                    $.mobile.loading("show");
                    $("#googleMap").html("");
                    $.ajax({
                        url: './urFoodAPI.php',
                        type: 'POST',
                        datatype: 'JSON',
                        data: {
                            func: "selectStoreMenu",
                            id: strID
                        },
                        success: function (response) {
                            var data = $.parseJSON(response);
                            showGeo(data[0].address, data[0].name);
                            $.mobile.loading("hide");
                        }
                    });
                }
                //google地理編碼
                function showGeo(addr, name) {
                    var geo = new google.maps.Geocoder().geocode({"address": addr}, function (result, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            console.log(result[0].geometry.location.lat() + "," + result[0].geometry.location.lng());
                            showMap(result[0].geometry.location.lat(), result[0].geometry.location.lng(), name);
                        } else {
                            console.log("Error");
                        }
                    });
                }
                //顯示地圖
                function showMap(maplat, maplng, name) {
                    var myLatLng = {lat: maplat, lng: maplng};
                    var map = new google.maps.Map($("#googleMap")[0], {
                        center: myLatLng,
                        zoom: 17,
                        scrollwheel: false
                    });
                    var marker = new google.maps.Marker({
                        map: map,
                        position: myLatLng
                    });
                    var content = "<div style=\"background-color: #660000; font-size: 18px;\">" + name + "</div>";
                    var infowindow = new google.maps.InfoWindow({
                        content: content
                    });
                    infowindow.open(map, marker);
                }
                
                //newStore頁面事件定義
                $(document).on("pageinit", "#newStore", function(){
                    $("#addCol").on("click", function() {
                            $("#newFileUpload").append("<input type='file' name='newUpload[]' />").trigger("create");
                    });
                    //送出表單    
                    $("#newForm").submit(function(){
                        event.stopPropagation();
                        event.preventDefault();

                        var formData = new FormData($(this)[0]);
                        formData.append("func", "insertStore");

                        $.ajax({
                            url: "./urFoodAPI.php",
                            type: "POST",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function (data) {
                                if ( $.parseJSON(data) == "OK" )
                                {
                                    $.mobile.changePage("#homePage"); 
                                }   
                            }     
                        });
                    });
                });
                
                //editStore頁面的事件定義
                $(document).on("pageinit", "#editStore", function (){
                    $("#editBtn").on("click", function (){
                        $.ajax({
                            url: "./urFoodAPI.php",
                            type: "POST",
                            datatype: "JSON",
                            data: {
                                func: "editStore",
                                id: editID,
                                editName: $("#editName").val(),
                                editAddr: $("#editAddr").val(),
                                editTel: $("#editTel").val()
                            },
                            success: function (response){
                                if ($.parseJSON(response) == "OK")
                                {
                                    $.mobile.changePage("#homePage");
                                }
                            }
                        });
                    });
                });

                //rdmFood頁面的事件定義
                $(document).on("pageinit", "#rdmFood", function () {

                    //產生隨機店家            
                    $("#rdmBtn").on("click", function () {
                        var rdmGroup = $("input[name='rdmGroup']:checked").val();
                        var rdmMeal = $("input[name='rdmMeal']:checked").val();
                        var objStore = new Array();

                        //canvas
                        var ctx = document.getElementById("rdmCanvas").getContext("2d");
                        var img = document.getElementById("photo");

                        $.mobile.loading("show");
                        $.ajax({
                            url: './urFoodAPI.php',
                            type: 'POST',
                            datatype: 'JSON',
                            data: {
                                func: "selectStoreData",
                                homeGroup: rdmGroup,
                                meal: rdmMeal
                            },
                            success: function (response) {
                                $.mobile.loading("hide");
                                var storeData = $.parseJSON(response);
                                $.each(storeData, function (i, item) {
                                    objStore[i] = {"id": item.id, "name": item.name};
                                });

                                var i = 0;
                                var count = 0;

                                function getRadom(min, max) {
                                    return Math.floor(Math.random() * (max - min)) + min;
                                }
                                function change(str) {
                                    
                                    ctx.save();
                                    ctx.drawImage(img, 0, 0, 300, 100);

                                    ctx.font = "30px sans-serif";
                                    ctx.fillStyle = "white";
                                    ctx.textBaseline = "top";
                                    ctx.textAlign = "center";
                                    ctx.fillText(str, 150, 35);
                                    ctx.restore();
                                }
                                var rdmNum = getRadom(40, 50);

                                var sI = setInterval(getStore, 1000 / 10);

                                function getStore() {
                                    if (count == rdmNum) {
                                        clearInterval(sI);
                                        setTimeout(function () {
                                            showMenu(objStore[i - 1].id);
                                        }, 2000);
                                    } else {
                                        if (i >= objStore.length)
                                            i = 0;
                                        change(objStore[i].name);
                                        i++;
                                        count++;
                                    }
                                }

                            }
                        });
                    });
                    // end of 產生隨機店家

                });


        </script>


    </body>
</html>
