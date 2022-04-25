date = new Date();
hour = date.getHours();
if ((hour >= 1) && (hour <= 5)) {greeting = "Go back to bed!";}
if ((hour >= 6) && (hour <= 11)) {greeting = "Good morning!";}
if ((hour >= 12) && (hour <= 16)) {greeting = "Good afternoon!";}
if ((hour >= 17) && (hour <= 21)) {greeting = "Good evening!";}
if ((hour == 22) || (hour == 23)) {greeting = "Almost bed time...";}
if (hour == 0) {greeting = "It's past midnight! Bed time!";}
document.write(greeting);
