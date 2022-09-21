@extends('layouts.master')

@section('title', 'Dashboard')

@push('style')

@endpush
@section('content')
<style>
    .ui-datepicker-calendar {
        display: none;
    }
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 320px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    input[type="number"] {
        min-width: 50px;
    }
</style>
	<!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default card-view pt-0">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body pa-0">
                        <div class="form-wrap">
                            <form class="form-inline mb-30 mt-30">
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Locater</label>
                                    <select class="form-control" id="id_locater" name="id_locater">
                                    </select>
                                </div>
                                <div class="form-group mr-15">
                                    <label class="control-label mr-10 text-left">Mounth Pick</label>
                                    <div class='input-group monthPicker'>
                                        <input type='text' class="form-control" name="datepicker" id="datepicker" value="{{ date_format(now(),'M-Y') }}" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-5 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body sm-data-box-1">
                        <div id="bar-high"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Daily Kwh</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block refresh mr-15">
                            <i class="zmdi zmdi-replay"></i>
                        </a>
                        <div class="pull-left inline-block dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="bar2-high"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>	
    <!-- Row -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-4 col-xs-12">
            <div class="panel panel-default card-view panel-refresh relative">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Total KWh</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block refresh mr-15">
                            <i class="zmdi zmdi-replay"></i>
                        </a>
                        <div class="pull-left inline-block dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="pie-high"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view panel-refresh">
                <div class="refresh-container">
                    <div class="la-anim-1"></div>
                </div>
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Gender Split</h6>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="pull-left inline-block refresh mr-15">
                            <i class="zmdi zmdi-replay"></i>
                        </a>
                        <div class="pull-left inline-block dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                            <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
                                <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <figure class="highcharts-figure">
                            <div id="treemap-high"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
@endsection

@push('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/treemap.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#datepicker").datepicker( {
        format: "MM-yyyy",
        startView: "months", 
        minViewMode: "months"
    });

    $.get( "{{ route('get.master') }}", function( data ) {
        $.each(data['locater'], function (i, value) {
                $('#id_locater').append('<option id=' + value['id_locater'] + '>' + value['txtLocaterName'] + '</option>');
            });
    });

});
    // Pie Chart
    Highcharts.chart('pie-high', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Total Kwh'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Compressor',
                y: 80,
                sliced: true,
                selected: true,
                color: '#8bc34a'
            },  {
                name: 'WWTP',
                y: 20
            }
            ]
        }]
    });

    Highcharts.chart('bar-high', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Kwh Consumtion Based On Panel'
        },
        // subtitle: {
        //     text: 'Source: <a ' +
        //         'href="https://en.wikipedia.org/wiki/List_of_continents_and_continental_subregions_by_population"' +
        //         'target="_blank">Wikipedia.org</a>'
        // },
        xAxis: {
            categories: ['Incoming 2', 'Incoming 1', 'Compressor', 'Chiller', 'Pump'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Population (millions)',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' millions'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Year 2022',
            data: [631, 727, 3202, 721, 260],
            color: '#8bc34a'
        }]
    });

    Highcharts.chart('bar2-high', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Daily - FG - New Kwh Cons'
        },
        subtitle: {
            text: 
                'Year : ' +
                'Sept 2022'
        },
        xAxis: {
            categories: [
                '1',
                '2',
                '3',
                '4',
                '5',
                '6',
                '7',
                '8',
                '9',
                '10',
                '11',
                '12',
                '13',
                '14',
                '15',
                '16',
                '17',
                '18',
                '19',
                '20',
                '21',
                '22',
                '23',
                '24',
                '25',
                '26',
                '27',
                '28',
                '29',
                '30',
                '31'
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: 'Kwh Cons'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Kwh Total',
            data: [13.93, 13.63, 13.73, 13.67, 14.37, 14.89, 14.56,
                14.32, 14.13, 13.93, 13.21, 12.16, 13.93, 13.63, 13.73, 13.67, 14.37, 14.89, 14.56,
                14.32, 14.13, 13.93, 13.21, 12.16, 14.32, 14.13, 13.93, 13.21, 12.16, 13.21, 12.16,],
            color: '#8bc34a'
        }]
    });

    Highcharts.chart('treemap-high', {
        series: [{
            type: "treemap",
            layoutAlgorithm: 'stripes',
            alternateStartingDirection: true,
            levels: [{
                level: 1,
                layoutAlgorithm: 'sliceAndDice',
                dataLabels: {
                    enabled: true,
                    align: 'left',
                    verticalAlign: 'top',
                    // style: {
                    //     fontSize: '15px',
                    //     fontWeight: 'bold'
                    // }
                }
            }],
            data: [{
                id: 'A',
                name: 'Compressor',
                color: "#8bc34a"
            }, {
                id: 'B',
                name: 'Chiller',
                color: '#F5FBEF'
            }, {
                id: 'C',
                name: 'Pump-Chiller',
                color: "#A09FA8"
            }, {
                id: 'D',
                name: 'WWTP',
                color: '#E7ECEF'
            }, {
                id: 'E',
                name: 'AHU',
                color: '#A9B4C2'
            }, {
                name: '14.34%',
                parent: 'A',
                value: 70923
            }, {
                name: '14.00%',
                parent: 'A',
                value: 35759
            }, {
                name: '13.23%',
                parent: 'B',
                value: 39494
            }, {
                name: '10.10%',
                parent: 'C',
                value: 13840
            }, {
                name: '9.10%',
                parent: 'C',
                value: 31969
            }, {
                name: '8.8%',
                parent: 'C',
                value: 8576
            }, {
                name: '8.0%',
                parent: 'D',
                value: 22768
            }, {
                name: '7.53%',
                parent: 'D',
                value: 49391
            },
            {
                name: '7.23%',
                parent: 'D',
                value: 454
            },
            {
                name: '6.6%',
                parent: 'D',
                value: 15925
            },
            {
                name: '5.0%',
                parent: 'E',
                value: 14981
            }]
        }],
        title: {
            text: 'Percen Of Panel Kwh Consumtion'
        },
        subtitle: {
            text:
                'Source: <a href="https://snl.no/Norge" target="_blank">SNL</a>'
        },
        tooltip: {
            useHTML: true,
            pointFormat:
                "The area of <b>{point.name}</b> is <b>{point.value} km<sup>2</sup></b>"
        }
    });

</script>

{{-- PAHO MQTT --}}
<script>
    let pahoConfig = {
        hostname: "broker.mqttdashboard.com",  
        port: "8000",           //The port number is the WebSocket-Port,
        clientId: "clientId-h1D5uERIgX"    //Should be unique for every of your client connections.
    }

    client = new Paho.MQTT.Client(pahoConfig.hostname, Number(pahoConfig.port), pahoConfig.clientId);
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    client.connect({
        onSuccess: onConnect
    });

    function onConnect() {
    console.log("Connected with Server");
    client.subscribe("testtopic/1");
    }

    function onConnectionLost(responseObject) {
        console.log(responseObject)
        if (responseObject.errorCode !== 0) {
            console.log("onConnectionLost:" + responseObject.errorMessage);
        }
    }

    function onMessageArrived(message) {
       
    }

    function handleMessage(message) {
        if (message != null || message != undefined) {
            console.log(message)
        }
    }
</script>
@endpush