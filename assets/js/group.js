// $(document).ready(function(){});
function onchangeDoSomething(n) {
  $("#water").empty();
  for(var i=0;i<n;i++)
   {
   $("#water").append( '<form action=""><input type="text" placeholder="Enter Member Id"></input></form>'  );
   }
};
