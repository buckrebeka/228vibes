// let music = document.getElementById("box-song");
let player = document.getElementById("player");
let song = document.getElementById("song");
let artist = document.getElementById("artist");
let image = document.getElementById("music-image");
let soundsBoxes = document.querySelectorAll(".play-box");

if(soundsBoxes) {
  soundsBoxes.forEach(function(playerBox) {
    playerBox.addEventListener("click", (e)=> {
      let path =playerBox.querySelector(".audio-path").textContent;
      let artistName =playerBox.querySelector(".artist-name").textContent;
      let songName =playerBox.querySelector(".song-name").textContent;
      let imagePath = playerBox.querySelector(".image-path").textContent;

      player.src=path;
      artist.textContent=artistName;
      song.textContent= songName;
      image.src=imagePath
    });
  });
}
