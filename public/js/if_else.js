// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
    var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet','black','pink'];
    var color = colors[Math.floor(Math.random()*colors.length)];

    var favorite = 'black'; // todo, change this to your favorite color from the list


// todo: Create a block of if/else statements to check for every color except indigo and violet.
// todo: When a color is encountered log a message that tells the color, and an object of that color.
// Example: Blue is the color of the sky.
// todo: Have a final else that will catch indigo and violet.
// todo: In the else, log: I do not know anything by that color.

    if(color == favorite) {
        alert('BLACK!!! Darkness!!!');
    }  else if (color === 'red') {
        console.log('Red is the color of BLOOD!!!')
    } else if (color === 'orange') {
        console.log('Orange is the color of the BURNING sun!');
    } else if (color === 'yellow') {
        console.log('Yellow is the color of YUCK!!');
    } else if (color === 'green'){
        console.log('Green is the color of MONEY!');
    } else if (color === 'blue') {
        console.log('Blue is the color of the ocean!!!');
    } else if (color === 'pink') {
        console.log('Pink is a GIRL color!!!');
    } else {
        console.log('Do not know anything about that color!');
    }


    switch(color) {
        case
    }
    

// todo: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
 var message = (color == favorite) ? alert("Color matches my FAVORITE") : console.log("Color is NOT my favorite");





