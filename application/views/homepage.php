<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>ymq</title>
    <meta name="viewport" content="initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/home.css" />
    <link rel="stylesheet" type="text/css" href="css/calendar.css" />
    <link rel="stylesheet" type="text/css" href="css/qq.css" />

    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.Sonline.js"></script>
</head>
<body>
<div class="container-fluid">

    <aside class="main-sidebar">

        <div class="logo">
            <a href="http://www.baidu.com/" ><h1>羽毛球时光</h1></a>
            <span>Badminton Times</span>
        </div>

        <div class="navigation">
            <ul class="main-menu">
                <li class="home"><a href="#home">时光</a></li>
                <li class="intro"><a href="#intro">介绍</a></li>
                <li class="schedule"><a href="#schedule">日程</a></li>
                <li class="photos"><a href="#photos">赏析</a></li>
                <li class="contact"><a href="#contact">联系</a></li>
            </ul>
        </div>

    </aside>

    <div class="main-content">

        <div class="home-section section" id="home">
            <div class="jumbotron">
                <h1>
                    <span class="blue">欢&nbsp;迎&nbsp;来&nbsp;到</span>
                    <span class="text-muted">羽</span>
                    <span class="orange">毛</span>
                    <span class="purple">球</span>
                    <span class="green">时</span>
                    <span class="red">光</span>
                </h1>
                <br/>
                <h3 class="blue">WELCOME TO BADMINTON TIMES</h3>

                <div class="login">

                </div>
            </div>
        </div>

        <div class="intro-section section" id="intro">
            <div class="section-title">
                <h2>介绍</h2>
            </div>
            <div class="section-text">
                <h3><span class="orange">运动，</span><span class="green">“羽”我常在</span></h3>
                <h3><span class="purple">健康，</span><span class="red">“羽”你同行</span></h3>
            </div>
            <br/>
            <div class="well well-lg">
                <h4>--------------------------------------</h4>
                <h4>更多内容，敬请期待</h4>
                <h4>--------------------------------------</h4>
            </div>
        </div>

        <div class="schedule-section section" id="schedule">
            <div class="section-title">
                <h2>日程</h2>
            </div>

            <section id="todoCalendar">
                <section class="time-zone">
                    <span class="time"></span>
                    <span class="month"></span>
                    <span class="year"></span>
                    <section class="controlBtn">
                        <button name="last" id="last" class="btn btn-info btn-sm">
                            <i class="glyphicon glyphicon-arrow-left"></i>
                        </button>
                        <button name="current" id="current" class="btn btn-sm">
                            <i class="glyphicon glyphicon-tasks"></i>
                        </button>
                        <button name="next" id="next" class="btn btn-info btn-sm">
                            <i class="glyphicon glyphicon-arrow-right"></i>
                        </button>
                    </section>
                </section>
                <table id="calendar" class="calendar table table-striped table-bordered">
                    <thead></thead>
                    <tbody></tbody>
                </table>
            </section>
        </div>

        <div class="photos-section section" id="photos">
            <div class="section-title">
                <h2>赏析</h2>
            </div>

            <div class="well well-lg">
                <h4>--------------------------------------</h4>
                <h4>更多内容，敬请期待</h4>
                <h4>--------------------------------------</h4>
            </div>
        </div>

        <div class="contact-section section" id="contact">
            <div class="section-title">
                <h2>联系</h2>
            </div>

            <div class="well well-lg">
                <h4>--------------------------------------</h4>
                <h4>更多内容，敬请期待</h4>
                <h4>--------------------------------------</h4>
            </div>
        </div>

    </div>

    <div class="site-footer">
        <p class="copyright">Copyright &copy; 2014 Dengbo Sun</p>
    </div>

</div>


<!--<script type='text/javascript' src='../js/home.js'></script>-->

<script>

var events_array = '<?php echo json_encode($activities); ?>';
var events = $.parseJSON(events_array);
var events_result = [];
for(var i_event = 0, l_event = events.length; i_event < l_event; i_event ++){
    var event_time = events[i_event].time;
    var event_title = events[i_event].owner;
    var month = event_time.substr(5, 2);
    var day = event_time.substr(8, 2);
    var event_date = month + "/" + day;
    events_result.push({
        "date" : event_date,
        "title" : event_title,
        "des" : events[i_event].description,
        "time" : events[i_event].time,
        "num" : events[i_event].num,
        "cost" : events[i_event].cost,
        "loc" : events[i_event].location,
        "tit" : events[i_event].title
    });
}

var ui = {
    // Render the Calendar
    "renderCalendar": function (mm, yy) {
        var _html = "";
        var cls = "";
        var msg = "";
        var id = "";
        var des = "";
        var num = "";
        var time = "";
        var cost = "";
        var loc = "";
        var tit = "";
        // Create current date object
        var now = new Date();
        // Defaults
        if (arguments.length == 0) {
            mm = now.getMonth();
            yy = now.getFullYear();
        }
        var mon = new Date(yy, mm, 1);  // first day of the month
        var yp = mon.getFullYear();
        var yn = mon.getFullYear();
        var prev = new Date(yp, mm - 1, 1);
        var next = new Date(yn, mm + 1, 1);
        var m = [
            "January"
            , "February"
            , "March"
            , "April"
            , "May"
            , "June"
            , "July"
            , "August"
            , "September"
            , "October"
            , "November"
            , "December"
        ];
        var d = [
            "Sun"
            , "Mon"
            , "Tue"
            , "Wed"
            , "Thu"
            , "Fri"
            , "Sat"
        ];
        var n = [
            31
            , 28
            , 31
            , 30
            , 31
            , 30
            , 31
            , 31
            , 30
            , 31
            , 30
            , 31
        ];
        // Leap year
        if (now.getYear() % 4 == 0) {
            n[1] = 29;
        }
        // Events
//        var event = {"event":[
//            {"date":"2/24", "title":"LiChong's Birthday"}
//        ]};
        var event = {"event":events_result}

        // Get some important days
        var fdom = mon.getDay(); // First day of month
        var mwks = 6 // Weeks in month
        // Render Month
        $('.year').html(mon.getFullYear());
        $('.month').html(m[mon.getMonth()]);
        // Clear view
        var h = $('#calendar > thead:last');
        var b = $('#calendar > tbody:last');
        h.empty();
        b.empty();
        // Render Days of Week
        for (var j = 0; j < d.length; j++) {
            _html += "<th>" + d[j] + "</th>";
        }
        _html = "<tr>" + _html + "</tr>";
        h.append(_html);
        // Render days
        var dow = 0;
        var first = 0;
        var last = 0;
        for (var i = 0; i >= last; i++) {
            _html = "";
            for (var j = 0; j < d.length; j++) {
                cls = "";
                msg = "";
                id = "";
                des = "";
                num = "";
                time = "";
                cost = "";
                loc = "";
                tit = "";
                // Determine if we have reached the first of the month
                if (first >= n[mon.getMonth()]) {
                    dow = 0;
                }
                else if ((dow > 0 && first > 0) || (j == fdom)) {
                    dow++;
                    first++;
                }
                // Format Day of Week with leading zero
                dow = "0" + dow;
                // Get last day of month
                if (dow == n[mon.getDate()]) {
                    last = n[mon.getDate()];
                }
                // Check Event schedule
                $.each(event.event, function () {
                    if (this.date == mon.getMonth() + 1 + "/" + dow.substr(-2)) {
                        cls = "activity";
                        msg = this.title;
                        des = this.des;
                        num = this.num;
                        time = this.time;
                        cost = this.cost;
                        loc = this.loc;
                        tit = this.tit;
                    }
                });
                if (cls.length == 0) {
                    if (
                        dow == now.getDate()
                            && now.getMonth() == mon.getMonth()
                            && now.getFullYear() == mon.getFullYear()
                        ) {
                        cls = "today";
                    } else if (j == 0 || j == 6) {
                        cls = "weekend";
                    } else {
                        cls = "";
                    }
                }
                // Set ID
                id = "cell_" + i + "" + j + "" + dow;
                // Render HTML
                if (dow == 0) {
                    _html += '<td>&nbsp;</td>';
                } else if (msg.length > 0) {
                    _html += '<td class="'+cls+'" id="'+id+'" owner="'+msg+'" des="'+des+'" time="'+time+'" cost="'+cost+'" num="'+num+'" loc="'+loc+'" tit="'+tit+'">' + dow.substr(-2) + '<br/></td>';
                } else {
                    _html += '<td class="'+cls+'" id="'+id+'" owner="'+msg+'" des="'+des+'" time="'+time+'" cost="'+cost+'" num="'+num+'" loc="'+loc+'" tit="'+tit+'">' + dow.substr(-2) + '<br/></td>';
                }

            }
            _html = "<tr>" + _html + "</tr>";
            b.append(_html);
        }
        $('#last').unbind('click').bind('click', function () {
            ui.renderCalendar(prev.getMonth(), prev.getFullYear());
        });
        $('#current').unbind('click').bind('click', function () {
            ui.renderCalendar(now.getMonth(), now.getFullYear());
        });
        $('#next').unbind('click').bind('click', function () {
            ui.renderCalendar(next.getMonth(), next.getFullYear());
        });
    },
    // Render Clock
    "renderTime":function () {
        var now = new Date();
        var tt = "AM";
        var hh = now.getHours();
        var nn = "0" + now.getMinutes();
        var ss = "0" + now.getSeconds();
        if (now.getHours() > 12) {
            hh = now.getHours() - 12;
            tt = "PM";
        }
        $('.time').html(
            hh + ":" + nn.substr(-2) + ":" + ss.substr(-2)  +" " + tt
        );
        var doit = function () {
            ui.renderTime();
        }
        setTimeout(doit, 500);
    }
};

$(document).ready(function () {
    // calendar
    ui.renderCalendar();
    ui.renderTime();

    // show schedule details
    var HTML = [
        '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">',
        '<div class="modal-dialog">',
        '<div class="modal-content">',
        '<div class="modal-header">',
        '<button type="button" class="close" data-dismiss="modal">',
        '<span aria-hidden="true">&times;</span>',
        '<span class="sr-only">Close</span>',
        '</button>',
        '<h4 class="modal-title" id="myModalLabel">活动详情</h4>',
        '</div>',
        '<div class="modal-body">',
        '<div class="panel panel-default activity-panel">',
        '<div class="panel-heading">活动详情</div>',
        '<div class="panel-body">',
        '<p class="activity-description"></p>',
        '</div>',
        '<ul class="list-group">',
        '<li class="list-group-item">时间：<b class="time-value"></b></li>',
        '<li class="list-group-item">发起：<b class="owner-value"></b></li>',
        '<li class="list-group-item">人数：<b class="num-value"></b><b>人</b></li>',
        '<li class="list-group-item">费用：<b class="cost-value"></b></li>',
        '<li class="list-group-item">地点：<b class="location-value"></b></li>',
        '</ul>',
        '</div>',
        '</div>',
        '<div class="modal-footer">',
        '<button type="button" class="btn btn-info" data-dismiss="modal">OK</button>',
        '</div>',
        '</div>',
        '</div>',
        '</div>'
    ].join("");
    var modal = $(HTML).appendTo('body');
    $('.schedule-section').click(function(e){
        var t = $(e.target);
        if(t.hasClass('activity')){
            $('#myModal').modal()
            $('#myModal').find(".panel-heading").html(t.attr("tit"));
            $('#myModal').find(".activity-description").html(t.attr("des"));
            $('#myModal').find(".time-value").html(t.attr("time"));
            $('#myModal').find(".owner-value").html(t.attr("owner"));
            $('#myModal').find(".cost-value").html(t.attr("cost"));
            $('#myModal').find(".num-value").html(t.attr("num"));
            $('#myModal').find(".location-value").html(t.attr("loc"));
        }
    })

    // Call QQ Client
    $("body").Sonline({
        Position : "right",
        Top : 200,
        Effect : true,
        DefaultsOpen:true,
        Qqlist:"1546864614|登博,214125662|李冲,504225743|水玉"
    });
});
</script>

</body>
</html>