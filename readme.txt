
Speedar 2.0 Readme
Copyright 2001-2004 Rietta Solutions.  All Rights Reserved.

Outline:
1. Overview
2. System Requirements
3. Installing on the Server
4. Customizing Speedar
5. Warranty & Disclaimer
6. Contact Information

-----------------------------
1. Overview
-----------------------------

Allow website visitors to clock their Internet connection speed.

Speedar allows any web browser to calculate its Internet connection speed.  It downloads a large web page while noting the time before the download starts and again after it completes. The time difference is used calculate the average data transfer rate.

Speedar works with any web browser that supports Javascript.  The program can either download a medium-sized (50 KB) or large-sized (500 KB) HTML document.  The time between the start of the download and the end of the download is used to calculate the connection speed.  The larger download returns more accurate speed results, but takes much longer on a dial-up connection.

-----------------------------
2. System Requirements
-----------------------------

* The end-users browser must support Javascript.

* Your server must have PHP installed in order to run the 
  results.php file.

-----------------------------
3. Installing on the Server
-----------------------------

To install Speedar, simply extract the ZIP file and upload the files to your server.  The start and
result pages can be customized; for more information see the Customizing section below.

The archive contains the following files:

FILE			Description
---------------------	-------------------------------------------
readme.txt		This file, the documentation.

speedar50.inc		Medium (50 KB) sample data file; do not edit.
speedar500.inc		Large (500 KB) sample data file; do not edit.

start.html		The page that launches the clock process.
			It can be customized to your liking, but contains
			Javascript neccessary for the clock process.

speedar_results.html	Customizable template for the results page.

results.php		Results page, which uses the speedar_results.html
			template.

-----------------------------
4. Customizing Speedar
-----------------------------

There are two pages that you should customize to change how Speedar looks on your website, start.html and speedar_results.html.  You can have any text you wish in the files and you should avoid using graphics as they reduce the accuracy of the results.

4.a Customizing the Starter Page

Edit the start.html file to change the page that launches the clock process.  The page contains Javascript code that will be executed by the browser to take an initial estimate for the speed and will then run a second pass with the medium or large sample for more accurate results.

4.b Customizing the Results Page

Edit speedar_results.html to customize your results page.  In general, it is a good idea to avoid using graphics as they can skew the results.  Within your HTML, you can include a number of Speedar tags, which will be replaced with result data.  The tags are enclosed in curley braces {} and are listed below:

Result Tag:       	Data:
---------------------	-----------------------------------
{start time}		The time that the download started.
{end time}		The time that the download stopped.
{download time}		The time elapsed between the start and stop time.
{data size}		The size of the results page (how much was downloaded).
{kbits}			The number of kilobits downloaded.
{kbytes}            	The number of kilobytes downloaded.
{linespeed}		The speed of the connection (kbytes / download time).

4.c Customizing the Results Driver (PHP Code)

The PHP code which drives the results is located in results.php.  You can edit this file, but doing so is beyond the scope of this documentation.

-----------------------------
5. Warranty & Disclaimer
-----------------------------

For specific licensing information, please see license.txt.  The license is BSD.

Rietta Solutions disclaims all warranties and conditions, either express or implied, including, but not limited to, implied warranties or conditions or conditions of merchantability, fitness for a particular purpose, title and non-infringement, with regard to the software, and the provision of or failure to provide support services.

In no event shall Rietta Solutions be liable for any special, incidental, indirect, or consequential damages whatsoever arising out of the use of or inability to use the software, or the failure to provide support services, even if Rietta Solutions has been advised of the possibility of such damages.

-----------------------------
6. Contact Information
-----------------------------

Website: 
	http://www.rietta.com/speedar

Mailing Address:

	Rietta Solutions
	10630 Greenock Way
	Duluth, GA 30097
	USA
