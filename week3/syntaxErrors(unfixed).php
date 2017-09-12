<?  php
*/Valerie Shipbaugh
Syntax Errors Lab
2007*/
$studentName=student;
echo "<html>\n";
echo "	<head\n";
echo "		<title>Syntax Errors</title>\n"
echo "		<style type=\"text/css\">\n";
echo "		body{ \n";
echo "			background-color:#008F00;\n";
echo "			color:#FFFFFF;\n";
echo "			font-size:medium;\n";
echo "			font-family:Georgia, Verdia,San-Serif;\n";
echo "			margin:50px 0 0 35px;\n";
echo "		}\n";
echo "		h1{\n";
echo "			font-size:150%;\n";
echo "		}\n";
echo "		.box{\n";
echo "			width:650px;\n";
echo "			padding:20px\n";
echo "			border:5px double #FFFFFF;n";
echo "			float:left;\n"
echo "		}\n";
echo "		</style>\n";
echo "	</head>\n";
echo "		<div class="box\">\n";
echo "		<h1>Dear $StudentName,</h1>\n";
echo "		<p>I hope that you are having a great semester so far.";
/info for students
echo "		<p>PHP is a fun language to learn. Here is some information about PHP that I bet you didn't know:</p>";
echo "		<p>PHP was written as a set of CGI binaries in the C programming language by the Danish/Greenlandic
			programmer Rasmus Lerdorf in 1994, to replace a small set of Perl scripts he had been using to maintain
			his personal homepage.[4] Lerdorf initially created PHP to display his r&eacute;sum&eacute; and to collect
			certain data, such as how much traffic his page was receiving. Personal Home Page Tools was publicly released
			on 8 June 1995 after Lerdorf combined it with his own Form Interpreter to create PHP/FI (this release is
			considered PHP version 2).[5]</p>\n"
echo "		<p>Zeev Suraski and Andi Gutmans, two Israeli developers at the Technion IIT, rewrote the parser in 1997
			and formed the base of PHP 3, changing the language's name to the recursive initialism PHP: Hypertext
			Preprocessor. The development team officially released PHP/FI 2 in November 1997 after months of beta
			testing. Public testing of PHP 3 began and the official launch came in June 1998. Suraski and Gutmans
			then started a new rewrite of PHP's core, producing the Zend Engine in 1999.[6] They also founded Zend Technologies
			in Ramat Gan, Israel, which actively manages the development of PHP.</p>\n";
echo "		<p>In May 2000, PHP 4, powered by the Zend Engine 1.0, was released. The most recent update released by
			The PHP Group, is for the older PHP version 4 code branch which, as of May 2007, is up to version 4.4.7.
			PHP 4 will be supported by security updates until 8 August 2008[7].</p>\n";
echo "		<p>On July 13, 2004, PHP 5 was released powered by the new Zend Engine II. PHP 5 included new features such as:[8]</p>\n";
echo '		<p> * Improved support for object-oriented programming<br />
  			* The PHP Data Objects extension, which defines a lightweight and consistent interface for accessing databases<br />
  			* Performance enhancements<br />
  			* Better support for MySQL and MSSQL<br />
  			* Embedded support for SQLite<br />
 			* Integrated SOAP support<br />
  			* Data iterators<br />
  			* Error handling via exceptions</p>\n"
echo "		<p>The latest stable version, PHP 5.2.4, was released on Aug 30, 2007.</p>\n";
echo "		</div>\n";
echo "		<br />\n";
echo "	</body>\n";

%>