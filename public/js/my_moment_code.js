var now = moment();

//return day
console.log(now.format('dddd'));

//add string inside//
console.log(now.format('[I love] YYYY'));

//from now method
var daysFromOct = moment("20111031", "YYYYMMDD"). fromNow();

console.log(daysFromOct);

var x  = moment().format();
console.log(x);

//start of day
 var startOfDay = now.startOf('day').fromNow();
 console.log(startOfDay);


//end of day is "x" hours
 var endOfDay = now.endOf('day').fromNow();
 console.log(endOfDay);

 //start of the current  hour
 var currentHour = moment().startOf('hour').fromNow();
 console.log(currentHour);

 //subtract days
 var lastweek = now.subtract(10, 'days');
 console.log(lastweek.fromNow());








 