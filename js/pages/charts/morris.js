$(function () {
    /*getMorris('line', 'line_chart');
    getMorris('bar', 'bar_chart');*/
    getMorris('area', 'area_chart');
    getMorris('donut', 'donut_chart');
});


function getMorris(type, element) {
    /*if (type === 'line') {
        Morris.Line({
            element: element,
            data: [{
                'period': '2011 Q3',
                'licensed': 3407,
                'sorned': 660
            }, {
                    'period': '2011 Q2',
                    'licensed': 3351,
                    'sorned': 629
                }, {
                    'period': '2011 Q1',
                    'licensed': 3269,
                    'sorned': 618
                }, {
                    'period': '2010 Q4',
                    'licensed': 3246,
                    'sorned': 661
                }, {
                    'period': '2009 Q4',
                    'licensed': 3171,
                    'sorned': 676
                }, {
                    'period': '2008 Q4',
                    'licensed': 3155,
                    'sorned': 681
                }, {
                    'period': '2007 Q4',
                    'licensed': 3226,
                    'sorned': 620
                }, {
                    'period': '2006 Q4',
                    'licensed': 3245,
                    'sorned': null
                }, {
                    'period': '2005 Q4',
                    'licensed': 3289,
                    'sorned': null
                }],
            xkey: 'period',
            ykeys: ['licensed', 'sorned'],
            labels: ['Licensed', 'Off the road'],
            lineColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)'],
            lineWidth: 3
        });
    } else if (type === 'bar') {
        Morris.Bar({
            element: element,
            data: [{
                x: '2011 Q1',
                y: 3,
                z: 2,
                a: 3
            }, {
                    x: '2011 Q2',
                    y: 2,
                    z: null,
                    a: 1
                }, {
                    x: '2011 Q3',
                    y: 0,
                    z: 2,
                    a: 4
                }, {
                    x: '2011 Q4',
                    y: 2,
                    z: 4,
                    a: 3
                }],
            xkey: 'x',
            ykeys: ['y', 'z', 'a'],
            labels: ['Y', 'Z', 'A'],
            barColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)'],
        });
    } else */if (type === 'area') {
        Morris.Area({
            element: element,
            data: [/*{
                period: '2010 Q1',
                project1: 2666,
                project2: null,
                project3: 2647
            }, {
                    period: '2010 Q2',
                    project1: 2778,
                    project2: 2294,
                    project3: 2441
                }, {
                    period: '2010 Q3',
                    project1: 4912,
                    project2: 1969,
                    project3: 2501
                }, {
                    period: '2010 Q4',
                    project1: 3767,
                    project2: 3597,
                    project3: 5689
                }, {
                    period: '2011 Q1',
                    project1: 6810,
                    project2: 1914,
                    project3: 2293
                }, */{
                    period: '2017 Q1',
                    project1: 5670,
                    project2: 4293,
                    project3: 1881
                }, {
                    period: '2017 Q2',
                    project1: 4820,
                    project2: 3795,
                    project3: 1588
                }, {
                    period: '2017 Q3',
                    project1: 15073,
                    project2: 5967,
                    project3: 5175
                }, {
                    period: '2017 Q4',
                    project1: 10687,
                    project2: 4460,
                    project3: 2028
                }, {
                    period: '2018 Q1',
                    project1: 8432,
                    project2: 5713,
                    project3: 1791
                }],
            xkey: 'period',
            ykeys: ['project1', 'project2', 'project3'],
            labels: ['Project 1', 'Project 2', 'Project 3'],
            pointSize: 2,
            hideHover: 'auto',
            lineColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)']
        });
    } else if (type === 'donut') {
        
        var blotterpatawag=$(".BlotterPatawagCount").text();
        var blotteronly=$(".BlotterCount").text();
        

        var totalblotter = parseInt(blotterpatawag)+parseInt(blotteronly);
        var BlotPerctBlot = (blotteronly/totalblotter) * 100;
        var BlotPerctBlotPat = (blotterpatawag/totalblotter) * 100;

        Morris.Donut({


            element: element,
            data: [{
                label: 'Blotter Patawag',
                value: BlotPerctBlotPat.toFixed()
                // alert ("totalblotter")
            }, {
                    label: 'Blotter Records',
                    value: BlotPerctBlot.toFixed()
                }/*, {
                    label: 'Custard',
                    value: 25
                }, {
                    label: 'Sugar',
                    value: 10
                }*/],
            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)'/*, 'rgb(255, 152, 0)', 'rgb(0, 150, 136)'*/],
            formatter: function (y) {
                return y + '%'
            }
        });
    }
}
