# Summary #

A set of scripts for producing a nicely formatted summary of a document in PDF form from a simple text file. The summary is organized according to the page numbers in the original (PDF) document and includes links to those pages in the original.

This system was inspired by [Walton Jones's method][4] of summarizing academic papers.


## Simple text file ##

The original file is assumed to be a PDF. The summary, which must be saved in the same directory as the original file, is written in this form:

    Title: Example document
    Subtitle: November 16, 2012
    File: example.pdf
    Starting page: 1
    Starting sheet: 1
    Pages per sheet: 1
    
    5
    The material on page 5 is interesting and this is a brief
    description of what's on it.
    
    7-8
    Pages 7 and 8 also have something I think is worth remembering,
    and I've described it here.
    
    11
    Page 11 is the last page with interesting content.

Of the header lines at the top, only Title and File are required. I often use the Subtitle line for the date of the original document, but it can be used for any extra information.

The other lines account for the possibilities that the page numbers printed on the original document don't always correspond to the page numbers in the PDF and that PDFs are often formatted as two-up or four-up, with more than one logical page per physical page.

The body of the summary consists of several stanzas, each starting with a line giving the page number(s) and followed by a brief description of what's on that page. Hyphens are used to indicate page ranges.

I describe how I go about dictating the body of the summary in [this blog post][3]. 

## Scripts ##

There are three scripts in the repository:

* `summary2md` is a Python script that transforms the simple summary format above into Markdown. The page numbers are turned into links to those pages in the original document.
*  `summary.php` is a PHP script that transforms, via PHP Markdown and SmartyPants processors, the Markdown produced by `summary2md` into a full HTML document.
* `summary2pdf` is a shell script that processes the simple summary file through `summary2md`, `summary.php`, and, finally, [`wkpdf`][1] to generate a nicely formatted PDF version of the summary.

`wkpdf` is a processor written in Ruby Cocoa that uses WebKit to transform an HTML document into a PDF. It must be installed in the user's `$PATH` so `summary2pdf` can execute it.

A couple of customizations you'll likely need to make are:

* Lines 3 and 4 of `summary.php` give the paths to the PHP Markdown and SmartyPants processors.
* Line 4 of `summary2pdf` gives the paths to `summary2md` and `summary.php`.

You may also want to change the fonts and other `<style>` choices given in `summary.php`.


## Use ##

If your simple summary file is named `example-summary.txt`, then running

    summary2pdf example-summary.txt

will generate a new file, `example-summary.pdf`, in the same folder as `example.pdf` and `example-summary.txt`.

The page numbers in `example-summary.pdf` will be links to the corresponding pages in `example.pdf`. I've found that neither Preview nor PDFpenPro will follow these links properly, but [Skim][2] will.



[1]: http://plessl.github.com/wkpdf/
[2]: http://skim-app.sourceforge.net/
[3]: http://www.leancrew.com/all-this/2012/11/notes-on-notes/
[4]: http://drosophiliac.com/2012/09/an-academic-notetaking-workflow.html
