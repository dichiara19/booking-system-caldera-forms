# Caldera Forms Booking System
This plugin was created to create a booking system using the now-past Caldera Forms. The plugin was made for a specific project but was meant to be reused in other projects. It has not been tested with other booking plugins, but has only been tested with Caldera Forms. Use the database connection to read the inputs of a given field and check if they have already been entered. If so, it does not allow the inclusion of new equal values.

It is not necessary to trace the form id, just enter the name of the field you want to check as unique.

Having not realized an administration area, it is necessary to replace the field ID manually both in the php file and in the js file.

The current solution is totally customizable, the js script acts by configuration on a Caldera Forms select field. The php file was meant to be reused in other projects, but you need to replace the field ID manually as mentioned above to make the query work properly.

## Installazione
Just insert the plugin in the wp-content/plugins folder and activate it or eventually install it via the Wordpress admin panel making sure you have compressed the folder into a zip file.

### Requisiti
* Caldera Forms 1.9.3

This is the configuration on which the plugin was made, it has not been tested on other versions.

### Plugin
* [Caldera Forms](https://wordpress.org/plugins/caldera-forms/)

### Utilizzo

Make sure to replace the database prefix in the php file and the field ID in the js file.
We have to make sure that the ID is correct because the one entered via Caldera Forms admin panel is the one that is used for the query but not the ID that is used for the select field that in my case corresponded to the attribute 'name'.

So: The select field ID displayed in the Caldera Forms admin panel is the one that should be used for the query and not the one that is used for the select field.

#### Altre informazioni

The code uses wp_enqueue_script to load the js script, so you need to make sure that the js file is loaded after the php file is loaded. This was done using the 'priority' parameter of wp_enqueue_script. Doing so runs the script on all pages regardless of the form you are using. To avoid using the 'priority' parameter, you can use the 'caldera_forms_render_get_form' filter to load the script only when the form is loaded. Or load the script only on the page where the form is located using wp_localize_script by calling the js file only on the page where the form is located. The solution is aimed at being immediately testable in all installations and then make the necessary customizations in terms of efficiency, performance etc.

The support to AJAX is to dynamically update the choices is under development, for the moment there is only one reconnaissance file.

The goal is to provide an area on the wordpress panel to dynamically administer fields, form and relative selection conditions
