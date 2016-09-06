<!-- AUI Framework -->
<?php require "header.php" ?>

<div id="page-content">
<div class="row mrg20B">
    <div class="col-md-4">
        <a href="javascript:;" class="tile-button btn clearfix bg-white mrg30B" title="">
            <div class="tile-header pad10A font-size-13 popover-title">
                资源下载
            </div>
            <div class="tile-content-wrapper">
                <i class="glyph-icon icon-cloud-download"></i>
                <div class="tile-content">
                    <i class="glyph-icon icon-arrow-up font-green"></i>
                    6<span>次下载</span>
                </div>
                <small>
                    12% new downloads
                </small>
            </div>
            <div class="tile-footer mrg5A primary-bg">
                查看详情
                <i class="glyph-icon icon-arrow-right"></i>
            </div>
        </a>

    </div>


    <div class="col-md-4">

        <a href="javascript:;" class="tile-button btn clearfix bg-white" title="">
            <div class="tile-header pad10A font-size-13 popover-title">
                今日访客
            </div>
            <div class="tile-content-wrapper">
                <i class="glyph-icon icon-credit-card"></i>
                <div class="tile-content">
                    12<span>位访客</span>
                </div>
                <small>
                    <i class="glyph-icon icon-caret-up"></i>
                    $272 daily revenue
                </small>
            </div>
            <div class="tile-footer mrg5A primary-bg">
                查看详情
                <i class="glyph-icon icon-arrow-right"></i>
            </div>
        </a>

    </div>

    <div class="col-md-4">

        <a href="javascript:;" class="tile-button btn clearfix bg-white" title="">
            <div class="tile-header pad10A font-size-13 popover-title">
                待处理事件
            </div>
            <div class="tile-content-wrapper">
                <i class="glyph-icon icon-dashboard"></i>
                <div class="tile-content">
                    <i class="glyph-icon icon-chevron-up font-yellow"></i>
                    4<span>个事件待处理</span>
                </div>
                <small>
                    <span class="font-orange">+22,5%</span> new traffic
                </small>
            </div>
            <div class="tile-footer mrg5A primary-bg">
                查看详情
                <i class="glyph-icon icon-arrow-right"></i>
            </div>
        </a>

    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="content-box border-top border-red">
            <h3 class="content-header clearfix">
                下载曲线图
                <small>(显示最近一周)</small>
                <div class="button-group float-right" data-toggle="buttons">
                    <a href="javascript:;" class="btn medium bg-blue-alt">
                        <input type="radio" name="test-toggle-radio">
                        <i class="glyph-icon icon-edit"></i>
                    </a>
                    <a href="javascript:;" class="btn medium bg-blue-alt">
                        <input type="radio" name="test-toggle-radio">
                        <i class="glyph-icon icon-camera"></i>
                    </a>
                    <a href="javascript:;" class="btn medium bg-blue-alt">
                        <input type="radio" name="test-toggle-radio">
                        <i class="glyph-icon icon-bar-chart-o"></i>
                    </a>
                </div>
            </h3>
            <div class="content-box-wrapper">

                <figure id="left-example-1" style="width: 98%; height: 300px;"></figure>

<script type="text/javascript">

var tt = document.createElement('div'),
  leftOffset = -(~~$('html').css('padding-left').replace('px', '') + ~~$('body').css('margin-left').replace('px', '')),
  topOffset = 0;
tt.className = 'tooltip top fade in';
document.body.appendChild(tt);

var data = {
  "xScale": "time",
  "yScale": "linear",
  "main": [
    {
      "className": ".pizza",
      "data": [
        {
          "x": "2012-11-05",
          "y": 6
        },
        {
          "x": "2012-11-06",
          "y": 6
        },
        {
          "x": "2012-11-07",
          "y": 8
        },
        {
          "x": "2012-11-08",
          "y": 3
        },
        {
          "x": "2012-11-09",
          "y": 4
        },
        {
          "x": "2012-11-10",
          "y": 9
        },
        {
          "x": "2012-11-11",
          "y": 6
        }
      ]
    }
  ]
};
var opts = {
  "dataFormatX": function (x) { return d3.time.format('%Y-%m-%d').parse(x); },
  "tickFormatX": function (x) { return d3.time.format('%A')(x); },
  "mouseover": function (d, i) {
    var pos = $(this).offset();
    $(tt).html('<div class="arrow"></div><div class="tooltip-inner">'+d3.time.format('%A')(d.x) + ': ' + d.y+'</div>')
      .css({top: topOffset + pos.top, left: pos.left + leftOffset})
      .show();
  },
  "mouseout": function (x) {
    $(tt).hide();
  }
};
var myChart = new xChart('line-dotted', data, '#left-example-1', opts);

</script>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="content-box border-top border-green">
            <h3 class="content-header clearfix">
                访客到访曲线图
                <small>(显示最近一周)</small>
                <div class="button-group float-right" id="upd-chart">
                    <a href="javascript:;" data-type="bar" class="btn medium bg-green">
                        <span class="button-content">Bar</span>
                    </a>
                    <a href="javascript:;" data-type="line-dotted" class="btn medium bg-green">
                        <span class="button-content">Line</span>
                    </a>
                    <a href="javascript:;" data-type="cumulative" class="btn medium bg-green">
                        <span class="button-content">Cumulative</span>
                    </a>
                </div>
            </h3>
            <div class="content-box-wrapper">

                <figure id="example-vis" style="width: 98%; height: 300px;"></figure>

<script type="text/javascript">

                (function () {

                var tt = document.createElement('div'),
                  leftOffset = -(~~$('html').css('padding-left').replace('px', '') + ~~$('body').css('margin-left').replace('px', '')),
                  topOffset = 0;
                tt.className = 'tooltip top fade in';
                document.body.appendChild(tt);

                var data = [{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":15,"x":"2012-11-19T00:00:00"},{"y":11,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":10,"x":"2012-11-22T00:00:00"},{"y":1,"x":"2012-11-23T00:00:00"},{"y":6,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"line-dotted","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"cumulative","yScale":"linear"},{"xScale":"ordinal","comp":[],"main":[{"className":".main.l1","data":[{"y":12,"x":"2012-11-19T00:00:00"},{"y":18,"x":"2012-11-20T00:00:00"},{"y":8,"x":"2012-11-21T00:00:00"},{"y":7,"x":"2012-11-22T00:00:00"},{"y":6,"x":"2012-11-23T00:00:00"},{"y":12,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]},{"className":".main.l2","data":[{"y":29,"x":"2012-11-19T00:00:00"},{"y":33,"x":"2012-11-20T00:00:00"},{"y":13,"x":"2012-11-21T00:00:00"},{"y":16,"x":"2012-11-22T00:00:00"},{"y":7,"x":"2012-11-23T00:00:00"},{"y":18,"x":"2012-11-24T00:00:00"},{"y":8,"x":"2012-11-25T00:00:00"}]}],"type":"bar","yScale":"linear"}];
                var order = [0, 1, 0, 2],
                  i = 0,
                  xFormat = d3.time.format('%A'),
                  chart = new xChart('line-dotted', data[order[i]], '#example-vis', {
                    axisPaddingTop: 5,
                    dataFormatX: function (x) {
                      return new Date(x);
                    },
                    tickFormatX: function (x) {
                      return xFormat(x);
                    },
                      mouseover: function (d, i) {
                        var pos = $(this).offset();
                        $(tt).html('<div class="arrow"></div><div class="tooltip-inner">'+d3.time.format('%A')(d.x) + ': ' + d.y+'</div>')
                          .css({top: topOffset + pos.top, left: pos.left + leftOffset})
                          .show();
                      },
                      mouseout: function (x) {
                        $(tt).hide();
                      },
                    timing: 1250
                  }),
                  rotateTimer,
                  toggles = d3.selectAll('#upd-chart a'),
                  t = 3500;

                function updateChart(i) {
                  var d = data[i];
                  chart.setData(d);
                  toggles.classed('active', function () {
                    return (d3.select(this).attr('data-type') === d.type);
                  });
                  return d;
                }

                toggles.on('click', function (d, i) {
                  clearTimeout(rotateTimer);
                  updateChart(i);
                });

                function rotateChart() {
                  i += 1;
                  i = (i >= order.length) ? 0 : i;
                  var d = updateChart(order[i]);
                  rotateTimer = setTimeout(rotateChart, t);
                }
                rotateTimer = setTimeout(rotateChart, t);
                }());

</script>

            </div>
        </div>
    </div>
</div>

<!-- <div class="row mrg20B">

    <div class="col-md-3">

        <a href="javascript:;" class="tile-button btn bg-blue-alt" title="">
            <div class="tile-content-wrapper">
                <i class="glyph-icon icon-dashboard"></i>
                <div class="tile-content">
                    <span>$</span>
                    378
                </div>
                <small>
                    <i class="glyph-icon icon-caret-up"></i>
                    <span></span>
                </small>
            </div>
            <div class="tile-footer">
                view details
                <i class="glyph-icon icon-arrow-right"></i>
            </div>
        </a>

    </div>

    <div class="col-md-3">

        <a href="javascript:;" class="tile-button btn bg-green" title="">
            <div class="tile-content-wrapper">
                <i class="glyph-icon icon-camera"></i>
                <div class="tile-content">
                    <span>$</span>
                    378
                </div>
                <small>
                    <i class="glyph-icon icon-caret-up"></i>
                    +7,6% new users in the first quarter
                </small>
            </div>
            <div class="tile-footer">
                view details
                <i class="glyph-icon icon-arrow-right"></i>
            </div>
        </a>

    </div>


    <div class="col-md-3">

        <a href="javascript:;" class="tile-button btn bg-azure" title="">
            <div class="tile-content-wrapper">
                <i class="glyph-icon icon-bullhorn"></i>
                <div class="tile-content">
                    <span>$</span>
                    378
                </div>
                <small>
                    <i class="glyph-icon icon-caret-up"></i>
                    +7,6% new users in the first quarter
                </small>
            </div>
            <div class="tile-footer">
                view details
                <i class="glyph-icon icon-arrow-right"></i>
            </div>
        </a>

    </div>

    <div class="col-md-3">

        <a href="javascript:;" class="tile-button btn bg-red" title="">
            <div class="tile-content-wrapper">
                <i class="glyph-icon icon-anchor"></i>
                <div class="tile-content">
                    <span>$</span>
                    378
                </div>
                <small>
                    <i class="glyph-icon icon-caret-up"></i>
                    +7,6% new users in the first quarter
                </small>
            </div>
            <div class="tile-footer">
                view details
                <i class="glyph-icon icon-arrow-right"></i>
            </div>
        </a>

    </div>

</div> -->

<!-- <div class="row">
    <div class="col-md-6">

        <div class="content-box tabs">
            <h3 class="content-box-header bg-black">
                <span>Content box</span>
                <ul class="float-right">
                    <li>
                        <a href="#chat-15" title="Chat list">
                            Chat list
                        </a>
                    </li>
                    <li>
                        <a href="#progress-25" title="Progress list">
                            Progress list
                        </a>
                    </li>
                    <li>
                        <a href="#notifications-35" title="Notifications list">
                            Notifications list
                        </a>
                    </li>
                </ul>
            </h3>

            <div id="chat-15">

                <ul class="chat-box mrg15A">
                    <li>
                        <div class="chat-author">
                            <img width="36" src="assets/images/gravatar.jpg" alt="">
                        </div>
                        <div class="popover left no-shadow">
                            <div class="arrow"></div>
                            <div class="popover-content">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                                    <div class="chat-time">
                                        <i class="glyph-icon icon-clock-o"></i>
                                        a few seconds ago
                                    </div>
                            </div>
                        </div>
                    </li>
                    <li class="float-left">
                        <div class="chat-author">
                            <img width="36" src="assets/images/gravatar.jpg" alt="">
                        </div>
                        <div class="popover right no-shadow">
                            <div class="arrow"></div>
                            <div class="popover-content">
                                    <h3>
                                        <a href="#" title="Horia Simon">Horia Simon</a>
                                        <div class="float-right">
                                            <a href="#" class="btn glyph-icon icon-inbox font-gray tooltip-button" data-placement="bottom" title="This chat line was received in the mail."></a>
                                        </div>
                                    </h3>
                                    This comment line has a title (author name) and a right button panel.
                                    <div class="chat-time">
                                        <i class="glyph-icon icon-clock-o"></i>
                                        a few seconds ago
                                    </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="chat-author">
                            <img width="36" src="assets/images/gravatar.jpg" alt="">
                        </div>
                        <div class="popover left">
                            <div class="arrow"></div>
                            <div class="popover-content">
                                This comment line has a bottom button panel, box shadow and title.
                                <div class="chat-time">
                                    <i class="glyph-icon icon-clock-o"></i>
                                    a few seconds ago
                                </div>
                                <div class="divider"></div>
                                <a href="#" class="small btn bg-gray font-bold text-transform-upr" title=""><span class="button-content">Reply</span></a>
                                <a href="#" class="small btn bg-red float-right tooltip-button" data-placement="left" title="Remove comment"><i class="glyph-icon icon-remove"></i></a>
                            </div>
                        </div>
                    </li>

                </ul>

            </div>
            <div id="progress-25">

                <ul class="progress-box mrg15A">
                    <li>
                        <div class="progress-title">
                            Finishing uploading files
                            <b>23%</b>
                        </div>
                        <div class="progressbar-small progressbar" data-value="23">
                            <div class="progressbar-value bg-blue">
                                <div class="progressbar-overlay"></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="progress-title">
                            Finishing uploading files
                            <b>91%</b>
                        </div>
                        <div class="progressbar-small progressbar" data-value="91">
                            <div class="progressbar-value primary-bg">
                                <div class="progressbar-overlay"></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="progress-title">
                            Finishing uploading files
                            <b>58%</b>
                        </div>
                        <div class="progressbar-small progressbar" data-value="58">
                            <div class="progressbar-value bg-blue-alt"></div>
                        </div>
                    </li>
                    <li>
                        <div class="progress-title">
                            Finishing uploading files
                            <b>74%</b>
                        </div>
                        <div class="progressbar-small progressbar" data-value="74">
                            <div class="progressbar-value bg-purple"></div>
                        </div>
                    </li>
                    <li>
                        <div class="progress-title">
                            Finishing uploading files
                            <b>91%</b>
                        </div>
                        <div class="progressbar-small progressbar" data-value="91">
                            <div class="progressbar-value primary-bg">
                                <div class="progressbar-overlay"></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="progress-title">
                            Finishing uploading files
                            <b>58%</b>
                        </div>
                        <div class="progressbar-small progressbar" data-value="58">
                            <div class="progressbar-value bg-blue-alt"></div>
                        </div>
                    </li>
                    <li>
                        <div class="progress-title">
                            Finishing uploading files
                            <b>32%</b>
                        </div>
                        <div class="progressbar-small progressbar" data-value="32">
                            <div class="progressbar-value bg-yellow"></div>
                        </div>
                    </li>
                </ul>

            </div>
            <div id="notifications-35">

                <ul class="notifications-box mrg15A">
                    <li>
                        <span class="btn bg-purple icon-notification glyph-icon icon-user"></span>
                        <span class="notification-text">This is an error notification</span>
                        <div class="notification-time">
                            a few seconds ago
                            <span class="glyph-icon icon-clock-o"></span>
                        </div>
                    </li>
                    <li>
                        <span class="btn bg-orange icon-notification glyph-icon icon-user"></span>
                        <span class="notification-text">This is a warning notification</span>
                        <div class="notification-time">
                            <b>15</b> minutes ago
                            <span class="glyph-icon icon-clock-o"></span>
                        </div>
                    </li>
                    <li>
                        <span class="bg-blue btn icon-notification glyph-icon icon-user"></span>
                        <span class="notification-text">Alternate error notification styling using helpers.</span>
                        <div class="notification-time">
                            <b>2 hours</b> ago
                            <span class="glyph-icon icon-clock-o"></span>
                        </div>
                    </li>
                    <li>
                        <span class="btn bg-purple icon-notification glyph-icon icon-user"></span>
                        <span class="notification-text">This is an error notification</span>
                        <div class="notification-time">
                            a few seconds ago
                            <span class="glyph-icon icon-clock-o"></span>
                        </div>
                    </li>
                    <li>
                        <span class="btn bg-orange icon-notification glyph-icon icon-user"></span>
                        <span class="notification-text">This is a warning notification</span>
                        <div class="notification-time">
                            <b>15</b> minutes ago
                            <span class="glyph-icon icon-clock-o"></span>
                        </div>
                    </li>
                    <li>
                        <span class="bg-blue btn icon-notification glyph-icon icon-user"></span>
                        <span class="notification-text font-blue">Alternate notification styling.</span>
                        <div class="notification-time">
                            <b>2 hours</b> ago
                            <span class="glyph-icon icon-clock-o"></span>
                        </div>
                    </li>
                </ul>

            </div>

        </div>

        <div class="content-box box-toggle button-toggle">
            <h3 class="content-box-header primary-bg">
                <span class="float-left">Hidden header buttons</span>
                <a href="#" class="float-right icon-separator btn toggle-button" title="Toggle Box">
                    <i class="glyph-icon icon-toggle icon-chevron-up"></i>
                </a>
                <a href="#" class="float-right icon-separator btn refresh-button" data-style="dark" data-theme="bg-white" data-opacity="60">
                    <i class="glyph-icon icon-refresh"></i>
                </a>
                <span class="badge label btn bg-blue-alt font-size-11 mrg10R float-right">Label</span>
            </h3>
            <div class="content-box-wrapper">

                <div class="row clearfix">
                    <div class="col-md-4 col-xs-12">
                        <div class="chart" data-percent="55">
                            <span>55</span>%
                        </div>
                        <div class="text-center pad10T font-size-13 font-bold font-gray text-transform-upr">New visits</div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="chart" data-percent="46">
                            <span>46</span>%
                        </div>
                        <div class="text-center pad10T font-size-13 font-bold font-gray text-transform-upr">Bounce rate</div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="chart" data-percent="92">
                            <span>92</span>%
                        </div>
                        <div class="text-center pad10T font-size-13 font-bold font-gray text-transform-upr">Server load</div>
                    </div>
                </div>
                <div class="row mrg20B mrg20T mobile-buttons">
                    <div class="col-md-6">
                        <a href="javascript:;" data-layout="top" data-type="success" class="bg-green medium radius-all-2 display-block btn noty">
                            <span class="button-content font-size-11 text-transform-upr">Top success</span>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="javascript:;" data-layout="bottom" data-type="error" class="bg-red medium radius-all-2 display-block btn noty">
                            <span class="button-content font-size-11 text-transform-upr">Bottom error</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="col-md-6">

        <div class="content-box">
            <h3 class="content-box-header primary-bg">
                <div class="glyph-icon icon-separator">
                    <i class="glyph-icon icon-comments"></i>
                </div>
                <span>Box with buttons</span>
            </h3>
            <div class="button-pane button-pane-top">
                <a href="javascript:;" class="btn small float-right mrg10L bg-azure" title="">
                    <span class="button-content">
                        <i class="glyph-icon icon-cog font-green"></i>
                    </span>
                </a>
                <div class="dropdown float-right">
                    <a href="javascript:;" class="btn small ui-state-default" title="" data-toggle="dropdown">
                        <span class="button-content text-center float-none font-size-11 text-transform-upr">
                            <i class="glyph-icon icon-caret-down float-right"></i>
                            Right aligned submenu
                        </span>
                    </a>
                    <ul class="dropdown-menu float-right">
                        <li>
                            <a href="javascript:;" title="">
                                Nav link 1
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" title="">
                                Nav link 2
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" title="">
                                Nav link 3
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content-box-wrapper">
                <div class="scrollable-large">

                    <div class="timeline-box chat-box">
                        <div class="tl-row">
                            <div class="tl-bullet bg-red"></div>
                            <div class="popover left no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                        <h3>
                                            <span class="font-red" title="Horia Simon">Lorem ipsum</span>
                                            <div class="float-right">
                                                <a href="#" class="btn glyph-icon icon-inbox font-gray tooltip-button" data-placement="bottom" title="" data-original-title="This chat line was received in the mail."></a>
                                            </div>
                                        </h3>
                                        Lorem ipsum dolor sit amet, Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                                        <div class="chat-time">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            a few seconds ago
                                        </div>
                                </div>
                            </div>

                            <div class="tl-panel">
                                3:21 PM
                            </div>
                        </div>
                        <div class="tl-row float-right">
                            <div class="tl-bullet bg-green"></div>
                            <div class="popover right no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                        <h3>
                                            <a href="#" class="font-green" title="Horia Simon">Horia Simon</a>
                                            <div class="float-right">
                                                <a href="#" class="btn glyph-icon icon-inbox font-gray tooltip-button" data-placement="bottom" title="" data-original-title="This chat line was received in the mail."></a>
                                            </div>
                                        </h3>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                        <div class="chat-time">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            5 minutes ago
                                        </div>
                                </div>
                            </div>

                            <div class="tl-panel">
                                2:15 PM
                            </div>
                        </div>
                        <div class="tl-row">
                            <div class="tl-bullet bg-red"></div>
                            <div class="popover left no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                        <h3>
                                            <span class="font-red" title="Horia Simon">Lorem ipsum</span>
                                            <div class="float-right">
                                                <a href="#" class="btn glyph-icon icon-inbox font-gray tooltip-button" data-placement="bottom" title="" data-original-title="This chat line was received in the mail."></a>
                                            </div>
                                        </h3>
                                        Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.
                                        <div class="chat-time">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            a few seconds ago
                                        </div>
                                </div>
                            </div>

                            <div class="tl-panel">
                                3:21 PM
                            </div>
                        </div>
                        <div class="tl-row float-right">
                            <div class="tl-bullet bg-blue-alt"></div>
                            <div class="popover right no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                        <h3>
                                            <a href="#" class="font-blue-alt" title="Horia Simon">Semper suscipit</a>
                                            <div class="float-right">
                                                <a href="#" class="btn glyph-icon icon-inbox font-gray tooltip-button" data-placement="bottom" title="" data-original-title="This chat line was received in the mail."></a>
                                            </div>
                                        </h3>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                        <div class="chat-time">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            5 minutes ago
                                        </div>
                                </div>
                            </div>

                            <div class="tl-panel">
                                2:15 PM
                            </div>
                        </div>
                        <div class="tl-row">
                            <div class="tl-bullet bg-azure"></div>
                            <div class="popover left no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                        <h3>
                                            <span class="font-azure" title="Horia Simon">Suspendisse urna nibh</span>
                                            <div class="float-right">
                                                <a href="#" class="btn glyph-icon icon-inbox font-gray tooltip-button" data-placement="bottom" title="" data-original-title="This chat line was received in the mail."></a>
                                            </div>
                                        </h3>
                                        Quisque volutpat mattis eros. Nullam malesuada erat ut turpis semper suscipit, posuere a, pede.
                                        <div class="chat-time">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            a few seconds ago
                                        </div>
                                </div>
                            </div>

                            <div class="tl-panel">
                                3:21 PM
                            </div>
                        </div>
                        <div class="tl-row float-right">
                            <div class="tl-bullet bg-orange"></div>
                            <div class="popover right no-shadow">
                                <div class="arrow"></div>
                                <div class="popover-content">
                                        <h3>
                                            <a href="#" class="font-orange" title="Horia Simon">Cicero dixit</a>
                                        </h3>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. 
                                        <div class="chat-time">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            5 minutes ago
                                        </div>
                                </div>
                            </div>

                            <div class="tl-panel">
                                2:15 PM
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="content-box bg-white mrg25T">
            <h3 class="content-box-header ui-state-default">
                <div class="glyph-icon icon-separator remove-bg">
                    <i class="glyph-icon icon-comments"></i>
                </div>
                <span>Sortable Todo list</span>
            </h3>
            <div class="content-box-wrapper">
                <div class="scrollable-content scrollable-medium">

                    <ul class="todo-box todo-sort">
                        <li class="border-red">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-1" id="sec-todo-1">
                            <label for="sec-todo-1">This is an example task that i need to finish</label>
                            <span class="label bg-red" title="">Overdue</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                        <li class="border-orange">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-2" id="sec-todo-2">
                            <label for="sec-todo-2">Update server to a newer version</label>
                            <span class="label bg-green" title="">2 Weeks</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                        <li class="border-blue">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-3" id="sec-todo-3">
                            <label for="sec-todo-3">Add more awesome template features</label>
                            <span class="label bg-blue" title="">Tomorrow</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                        <li class="border-purple">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-4" id="sec-todo-4">
                            <label for="sec-todo-4">Never forget to buy milk</label>
                            <span class="label bg-black" title="">Today</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                        <li class="border-red">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-11" id="sec-todo-11">
                            <label for="sec-todo-11">This is an example task that i need to finish</label>
                            <span class="label bg-red" title="">Overdue</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                        <li class="border-orange">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-22" id="sec-todo-22">
                            <label for="sec-todo-22">Update server to a newer version</label>
                            <span class="label bg-green" title="">2 Weeks</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                        <li class="border-blue">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-33" id="sec-todo-33">
                            <label for="sec-todo-33">Add more awesome template features</label>
                            <span class="label bg-blue" title="">Tomorrow</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                        <li class="border-azure">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-5" id="sec-todo-5">
                            <label for="sec-todo-5">Respond to all helpdesk questions</label>
                            <span class="label bg-purple" title=""> Label 2</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                        <li class="border-green">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-6" id="sec-todo-6">
                            <label for="sec-todo-6">Fix bugs for future releases</label>
                            <span class="label bg-azure" title=""> Label 2</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                        <li class="border-blue-alt">
                            <div class="glyph-icon sort-handle icon-ellipsis-v"></div>
                            <input type="checkbox" name="sec-todo-7" id="sec-todo-7">
                            <label for="sec-todo-7">Clean up the system directory</label>
                            <span class="label bg-blue-alt" title=""> Label 2</span>
                            <a href="#" class="btn small bg-red float-right" title="">
                                <i class="glyph-icon icon-remove"></i>
                            </a>
                            <a href="#" class="btn small bg-green float-right" title="">
                                <i class="glyph-icon icon-check"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
</div> -->





                	</div><!-- #page-content -->
	            </div><!-- #page-main -->
            </div><!-- #page-main-wrapper -->
        </div><!-- #page-wrapper -->

    </body>
</html>

