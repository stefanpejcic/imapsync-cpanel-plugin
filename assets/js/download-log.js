function downloadLog() {
  var logContent = document.querySelector('pre').innerText;
  var file = new Blob([logContent], {type: 'text/plain'});
  var a = document.createElement('a');
  var url = URL.createObjectURL(file);
  a.href = url;
  a.download = 'migration-log.txt';
  document.body.appendChild(a);
  a.click();
  setTimeout(function() {
    document.body.removeChild(a);
    window.URL.revokeObjectURL(url);  
  }, 0); 
}
