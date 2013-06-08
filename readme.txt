------------------
YTC WordPress Theme
Designed by Thanh Nguyen Dac
------------------

Thank you for downloading this file. Below is the guide of YTC WordPress Theme.

------------------Homepage------------------
Q: How to config homepage slider?
A: In the dashboard. Go to Appearance -> Theme Options -> Homepage -> Main Slider

Q: How to config slider settings?
A: Go to Appearance -> Theme Options -> Slider

Q: How to config homepage column sidebar?
A: To config first column sidebar on homepage, 
        go to Appearance -> Theme Options -> Widget -> Homepage Column Sidebar 1

   To config second column sidebar on homepage,
        go to Appearance -> Theme Options -> Widget -> Homepage Column Sidebar 2
        
   To config third column sidebar on homepage,
        go to Appearance -> Theme Options -> Widget -> Homepage Main Sidebar

Q: How to config footer sidebar?
A: To config first column sidebar on footer
    Go to Appearance -> Theme Options -> Widget -> Footer Column Sidebar 1
   
   and so on...

Q: How to config banner?
A: Go to Appearance -> Theme Options -> General -> Banner List
    Add 1 image to banner list to display only 1 banner.
    Add 2 or more images to banner list to display banner ramdomly when reloading page or visiting another page.

------------------Blog------------------
Q: How to create blog template to display blog posts?
A: Create a new page with the name that you like. 
    Look for the Page Attibutes metabox, in the Template dropdown menu, choose Blog Template

Q: How to config blog settings?
A: Go to Appearance -> Theme Options -> Blog

------------------Video------------------
Q: How to create video template to display video?
A: Create a new page with the name that you like. 
    Look for the Page Attibutes metabox, in the Template dropdown menu, choose Video Template

Q: How to config video settings?
A: Go to Appearance -> Theme Options -> Video

------------------Pagination------------------
Search & install WP-PageNani plugin.
Go to Settings -> PageNavi. Uncheck Use pagenavi-css.css


------------------Fullwidth Page------------------
Q: How to create fullwidth page (without sidebar)?
A: Create a new page with the name that you like. 
    Look for the Page Attibutes metabox, in the Template dropdown menu, choose Fullwidth Template

------------------Shop------------------
YTC supports Woocommerce plugin. If you want to create a webshop, search & install Woocommerce.

------------------Shortcodes------------------
Button shortcode: 
Available color: red, blue, yellow, green, orange, violet, gray
Ex: Create a red button with 'WordPress' text, link to http://wordpress.org
  [ytc_btn color="red" to="http://wordpress.org"]WordPress[/ytc_btn]

Youtube video shortcode:
[ytc_youtube_embed src="http://www.youtube.com/watch?v=xZEO1Lug25s"]

Vimeo video shortcode:
[ytc_vimeo_embed src="http://vimeo.com/22894905"]


--------------Widget button shortcodes------------------ 
Attributes:
color: config color of a button
to: url of a button

Ex: In the textwidget type the text below to create 4 squares color buttons,
You can config the color, url & the text of a button (like here are MUSIC, DANCE...):

[ytc_widget_btn_group]

[ytc_widget_btn color="red" to="http://vnexpress.net"]
MUSIC
[/ytc_widget_btn]

[ytc_widget_btn color="green" to="http://vnexpress.net"]
DANCE
[/ytc_widget_btn]

[ytc_widget_btn color="yellow" to="http://vnexpress.net"]
PERFORMANCE
[/ytc_widget_btn]

[ytc_widget_btn color="blue" to="http://vnexpress.net"]
ACTING
[/ytc_widget_btn]

[/ytc_widget_btn_group]



------------------WIDGET----------------------
Custom widgets


------------------Languages------------------
Look at folder languages/ for .po & .mo files
Available languages: English, Vietnamese.