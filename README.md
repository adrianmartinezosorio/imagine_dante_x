# imagine_dante_x

Php para dummies.

Adrián Martínez Osorio.

https://github.com/adrianmartinezosorio/imagine_dante_x

# Instalación

include("imagine_connect.php"); <br>
include("imagine_dante.php");

# Conexión

Se diferencian los datos de conexión del resto del framework para poder trabajar con diferentes conexiones en diferentes proyectos simultáneamente.

#Proyecto 1:

include("imagine_connect.php");
include("imagine_dante.php");

#Proyecto 2:

include("imagine_connect_2.php");
include("imagine_dante.php");

(Duplicamos el archivo)