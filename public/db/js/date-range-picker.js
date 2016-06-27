$(document).ready(function () {
    function updateConfig() {
        var e = {};
        $("#singleDatePicker").is(":checked") && (e.singleDatePicker = !0), $("#showDropdowns").is(":checked") && (e.showDropdowns = !0), $("#showWeekNumbers").is(":checked") && (e.showWeekNumbers = !0), $("#showISOWeekNumbers").is(":checked") && (e.showISOWeekNumbers = !0), $("#timePicker").is(":checked") && (e.timePicker = !0), $("#timePicker24Hour").is(":checked") && (e.timePicker24Hour = !0), (typeof $("#timePickerIncrement").val() !== "undefined" ? $("#timePickerIncrement").val().length : false) && 1 != $("#timePickerIncrement").val() && (e.timePickerIncrement = parseInt($("#timePickerIncrement").val(), 10)), $("#timePickerSeconds").is(":checked") && (e.timePickerSeconds = !0), $("#autoApply").is(":checked") && (e.autoApply = !0), $("#dateLimit").is(":checked") && (e.dateLimit = {
            days: 7
        }), $("#ranges").is(":checked") && (e.ranges = {
            Today: [moment(), moment()]
            , Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")]
            , "Last 7 Days": [moment().subtract(6, "days"), moment()]
            , "Last 30 Days": [moment().subtract(29, "days"), moment()]
            , "This Month": [moment().startOf("month"), moment().endOf("month")]
            , "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
        }), $("#locale").is(":checked") && (e.locale = {
            format: "MM/DD/YYYY"
            , separator: " - "
            , applyLabel: "Apply"
            , cancelLabel: "Cancel"
            , fromLabel: "From"
            , toLabel: "To"
            , customRangeLabel: "Custom"
            , daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
            , monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
            , firstDay: 1
        }), $("#linkedCalendars").is(":checked") || (e.linkedCalendars = !1), $("#autoUpdateInput").is(":checked") || (e.autoUpdateInput = !1), $("#alwaysShowCalendars").is(":checked") && (e.alwaysShowCalendars = !0), (typeof $("#parentEL").val() !== "undefined" ? $("#parentEL").val().length : false) && (e.parentEl = $("#parentEl").val()), (typeof $("#startDate").val() !== 'undefined') && $("#startDate").val().length && (e.startDate = $("#startDate").val()), (typeof $("#endDate").val() !== "undefined" ? $("#endDate").val().length : false) && (e.endDate = $("#endDate").val()), (typeof $("#minDate").val() !== "undefined" ? $("#minDate").val().length : false) && (e.minDate = $("#minDate").val()), (typeof $("#maxDate").val() !== "undefined" ? $("#maxDate").val().length : false) && (e.maxDate = $("#maxDate").val()), (typeof $("#opens").val() !== "undefined" ? $("#opens").val().length : false) && "right" != $("#opens").val() && (e.opens = $("#opens").val()), (typeof $("#drops").val() !== "undefined" ? $("#drops").val().length : false) && "down" != $("#drops").val() && (e.drops = $("#drops").val()), (typeof $("#buttonClasses").val() !== "undefined" ? $("#buttonClasses").val().length : false) && "btn btn-sm" != $("#buttonClasses").val() && (e.buttonClasses = $("#buttonClasses").val()), (typeof $("#applyClass").val() !== "undefined" ? $("#applyClass").val().length : false) && "btn-success" != $("#applyClass").val() && (e.applyClass = $("#applyClass").val()), (typeof $("#cancelClass").val() !== "undefined" ? $("#cancelClass").val().length : false) && "btn-default" != $("#cancelClass").val() && (e.cancelClass = $("#cancelClass").val()), $("#config-text").val("$('#demo').daterangepicker(" + JSON.stringify(e, null, "    ") + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});"), $("#config-demo").daterangepicker(e, function (e, t, a) {
            console.log("New date range selected: " + e.format("YYYY-MM-DD") + " to " + t.format("YYYY-MM-DD") + " (predefined range: " + a + ")")
        })
    }
    $("#date-range-picker").daterangepicker(), $("#date-time-picker").daterangepicker({
        timePicker: !0
        , timePickerIncrement: 30
        , locale: {
            format: "MM/DD/YYYY h:mm A"
        }
    }), $("#single-date-picker").daterangepicker({
        singleDatePicker: !0
        , showDropdowns: !0
    }, function (e, t, a) {
        var n = moment().diff(e, "years");
        alert("You are " + n + " years old.")
    }), $("#predefined-ranges-picker").daterangepicker({
        ranges: {
            Today: [moment(), moment()]
            , Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)]
            , "Last 7 Days": [moment().subtract("days", 6), moment()]
            , "Last 30 Days": [moment().subtract("days", 29), moment()]
            , "This Month": [moment().startOf("month"), moment().endOf("month")]
            , "Last Month": [moment().subtract("month", 1).startOf("month"), moment().subtract("month", 1).endOf("month")]
        }
        , opens: "left"
        , startDate: moment().subtract(29, "days")
        , endDate: moment()
    }, function (e, t, a) {
        $("#predefined-ranges-picker span").html(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
    }), $("#predefined-ranges-picker span").html(moment().subtract(29, "days").format("MMMM D, YYYY") + " - " + moment().format("MMMM D, YYYY")), $("#with-icon-picker").daterangepicker(), $("#no-icon-picker").daterangepicker(), $("#bottom-right-picker").daterangepicker({
        opens: "right"
        , drops: "down"
    }), $("#bottom-left-picker").daterangepicker({
        opens: "left"
        , drops: "down"
    }), $("#bottom-center-picker").daterangepicker({
        opens: "center"
        , drops: "down"
    }), $("#top-center-picker").daterangepicker({
        opens: "center"
        , drops: "up"
    }), $("#top-right-picker").daterangepicker({
        opens: "right"
        , drops: "up"
    }), $("#top-left-picker").daterangepicker({
        opens: "left"
        , drops: "up"
    }), $("#input-initially-empty-picker").daterangepicker({
        autoUpdateInput: !1
        , locale: {
            cancelLabel: "Clear"
        }
    }), $("#input-initially-empty-picker").on("apply.daterangepicker", function (e, t) {
        $(this).val(t.startDate.format("MM/DD/YYYY") + " - " + t.endDate.format("MM/DD/YYYY"))
    }), $("#input-initially-empty-picker").on("cancel.daterangepicker", function (e, t) {
        $(this).val("")
    }), $("#auto-apply-picker").daterangepicker({
        autoApply: !0
    }), $("#show-week-number-picker").daterangepicker({
        showWeekNumbers: !0
    }), $("#custom-button-picker").daterangepicker({
        applyClass: "btn-raised btn-black"
        , cancelClass: "btn-raised btn-default"
    }), $("#config-text").keyup(function () {
        eval($(this).val())
    }), $(".configurator input, .configurator select").change(function () {
        updateConfig()
    }), $(".demo i").click(function () {
        $(this).parent().find("input").click()
    }), $("#startDate").daterangepicker({
        locale: {
          format: "YYYY-MM-DD"
        },
        singleDatePicker: !0
        //, startDate: moment()
    }), $("#endDate").daterangepicker({
        singleDatePicker: !0
        //, startDate: moment()
    }), updateConfig()
});
