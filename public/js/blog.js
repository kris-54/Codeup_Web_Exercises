var time = moment().startOf('hour').fromNow();
console.log(time);

var posts = [
    {
        "title": "Nerd Month",
        "date" : "date",
        "img" : '/img/honda-rebel.jpg',
        "content": 'Lorem ipsum dolor sit amet consectetur adipisicing elit'
    },
    {
        "title": "Big Bang Theory",
        "date" : "date",
        "content": "Lorem ipsum dolor sit amet consectetur adipisicing elit'STUFF STUFF STUFF"
    },
    {
        "title": "Life during Codeup",
        "date" : "date",
        "content": "STUFF STUFF STUFF STUFF Lorem ipsum dolor sit amet consectetur adipisicing elit"
    },
    {
        "title": "Codeup",
        "date" : "date",
        "content": "BLAH BLAH BLAH, stuff stuff stuff stuff, & stuff, stuff, stuff and MORE STUFF"
    },
    {
        "title": "Coding 101 for Beginners",
        "date" : "date",
        "content" : "BLAH BLAH BLAH, stuff stuff stuff stuff, & stuff, stuff, stuff and MORE and MORE STUFF about STUFF and STUFF and STUFF STUFF STUFF STUFF STUFF STUFF"
    }
];

var bloggy = document.getElementById('posty');


posts.forEach(function (post,index,array) {
     bloggy.innerHTML += "<h4>" + post.title + "</h4>";
     bloggy.innerHTML += '<img src="">'  + post.img;
     bloggy.innerHTML += "<h4>Content: </h4>" + post.content;
     bloggy.innerHTML += "<h6>date: </h6>" + time;

});

