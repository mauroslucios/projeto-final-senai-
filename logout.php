<?php
	  // Fazer Logout
      session_destroy();
      session_unset();
	  echo "<script>alert('Você saiu!');top.location.href='entrar.php';</script>"; 
	  session_destroy();
      session_unset();
	  
	  ?>