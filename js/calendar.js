
var ui = {
    // Render the Calendar
    "renderCalendar": function (mm, yy) {
        var _html = "";
        var cls = "";
        var msg = "";
        var id = "";

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
        var event = {"event":[
            {"date":"2/24", "title":"LiChong's Birthday"}
        ]};

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
                    _html += '<td class="' + cls + '" id="' + id + '">' + dow.substr(-2) + '<br/><span class="content">' + msg + '</span></td>';
                } else {
                    _html += '<td class="' + cls + '" id="' + id + '">' + dow.substr(-2) + '</td>';
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
    },


    // Initialization
    "init":function () {

    }

};



$(document).ready(function () {
    ui.renderCalendar();
    ui.renderTime();

    ui.init();
});