const video = {
title: 'a',
play() {
console.log(this);
}
}

video.stop = function(){
console.log(this);
}

video.stop();

video.play();

console.log(this);