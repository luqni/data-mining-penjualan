/*==================================================*
 $Id: slideshow.js,v 1.16 2003/10/14 12:39:00 pat Exp $
 Copyright 2000-2003 Patrick Fitzgerald
 http://slideshow.barelyfitz.com/

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *==================================================*/

// There are two objects defined in this file:
// "slide" - contains all the information for a single slide
// "slideshow" - consists of multiple slide objects and runs the slideshow

//==================================================
// slide object
//==================================================
function slide(src,link,text,target,attr) {
  // This is the constructor function for the slide object.
  // It is called automatically when you create a new slide object.
  // For example:
  // s = new slide();

  // Image URL
  this.src = src;

  // Link URL
  this.link = link;

  // Text to display
  this.text = text;

  // Name of the target window ("_blank")
  this.target = target;

  // Custom duration for the slide, in milliseconds.
  // This is an optional parameter.
  // this.timeout = 3000

  // Attributes for the target window:
  // width=n,height=n,resizable=yes or no,scrollbars=yes or no,
  // toolbar=yes or no,location=yes or no,directories=yes or no,
  // status=yes or no,menubar=yes or no,copyhistory=yes or no
  // Example: "width=200,height=300"
  this.attr = attr;

  // Create an image object for the slide
  if (document.images) {
    this.image = new Image();
  }

  // Flag to tell when load() has already been called
  this.loaded = false;

  //--------------------------------------------------
  this.load = function() {
    // This method loads the image for the slide

    if (!document.images) { return; }

    if (!this.loaded) {
      this.image.src = this.src;
      this.loaded = true;
    }
  }

  //--------------------------------------------------
  this.hotlink = function() {
    // This method jumps to the slide's link.
    // If a window was specified for the slide, then it opens a new window.

    var mywindow;

    // If this slide does not have a link, do nothing
    if (!this.link) return;

    // Open the link in a separate window?
    if (this.target) {

      // If window attributes are specified,
      // use them to open the new window
      if (this.attr) {
        mywindow = window.open(this.link, this.target, this.attr);
  
      } else {
        // If window attributes are not specified, do not use them
        // (this will copy the attributes from the originating window)
        mywindow = window.open(this.link, this.target);
      }

      // Pop the window to the front
      if (mywindow && mywindow.focus) mywindow.focus();

    } else {
      // Open the link in the current window
      location.href = this.link;
    }
  }
}

//==================================================
// slideshow object
//==================================================
function slideshow( slideshowname ) {
  // This is the constructor function for the slideshow object.
  // It is called automatically when you create a new object.
  // For example:
  // ss = new slideshow("ss");

  // Name of this object
  // (required if you want your slideshow to auto-play)
  // For example, "SLIDES1"
  this.name = slideshowname;

  // When we reach the last slide, should we loop around to start the
  // slideshow again?
  this.repeat = true;

  // Number of images to pre-fetch.
  // -1 = preload all images.
  //  0 = load each image is it is used.
  //  n = pre-fetch n images ahead of the current image.
  // I recommend preloading all images unless you have large
  // images, or a large amount of images.
  this.prefetch = -1;

  // IMAGE element on your HTML page.
  // For example, document.images.SLIDES1IMG
  this.image;

  // ID of a DIV element on your HTML page that will contain the text.
  // For example, "slides2text"
  // Note: after you set this variable, you should call
  // the update() method to update the slideshow display.
  this.textid;

  // TEXTAREA element on your HTML page.
  // For example, document.SLIDES1FORM.SLIDES1TEXT
  // This is a depracated method for displaying the text,
  // but you might want to supply it for older browsers.
  this.textarea;

  // Milliseconds to pause between slides.
  // Individual slides can override this.
  this.timeout = 500;

  // Hook functions to be called before and after updating the slide
  // this.pre_update_hook = function() { }
  // this.post_update_hook = function() { }

  // These are private variables
  this.slides = new Array();
  this.current = 0;
  this.timeoutid = 0;

  //--------------------------------------------------
  // Public methods
  //--------------------------------------------------
  this.add_slide = function(slide) {
    // Add a slide to the slideshow.
    // For example:
    // SLIDES1.add_slide(new slide("s1.jpg", "link.html"))
  
    var i = this.slides.length;
  
    // Prefetch the slide image if necessary
    if (this.prefetch == -1) {
      slide.load();
    }

    this.slides[i] = slide;
  }

  //--------------------------------------------------
  this.play = function(timeout) {
    // This method implements the automatically running slideshow.
    // If you specify the "timeout" argument, then a new default
    // timeout will be set for the slideshow.
  
    // Make sure we're not already playing
    this.pause();
  
    // If the timeout argument was specified (optional)
    // then make it the new default
    if (timeout) {
      this.timeout = timeout;
    }
  
    // If the current slide has a custom timeout, use it;
    // otherwise use the default timeout
    if (typeof this.slides[ this.current ].timeout != 'undefined') {
      timeout = this.slides[ this.current ].timeout;
    } else {
      timeout = this.timeout;
    }

    // After the timeout, call this.loop()
    this.timeoutid = setTimeout( this.name + ".loop()", timeout);
  }

  //--------------------------------------------------
  this.pause = function() {
    // This method stops the slideshow if it is automatically running.
  
    if (this.timeoutid != 0) {

      clearTimeout(this.timeoutid);
      this.timeoutid = 0;

    }
  }

  //--------------------------------------------------
  this.update = function() {
    // This method updates the slideshow image on the page

    // Make sure the slideshow has been initialized correctly
    if (! this.valid_image()) { return; }
  
    // Call the pre-update hook function if one was specified
    if (typeof this.pre_update_hook == 'function') {
      this.pre_update_hook();
    }

    // Convenience variable for the current slide
    var slide = this.slides[ this.current ];


    // Load the slide image if necessary
    slide.load();
  
    // Update the image.
    this.image.src = slide.image.src;

    // Update the text
    this.display_text();

    // Call the post-update hook function if one was specified
    if (typeof this.post_update_hook == 'function') {
      this.post_update_hook();
    }

    // Do we need to pre-fetch images?
    if (this.prefetch > 0) {

      var next, prev, count;

      // Pre-fetch the next slide image(s)
      next = this.current;
      prev = this.current;
      count = 0;
      do {

        // Get the next and previous slide number
        // Loop past the ends of the slideshow if necessary
        if (++next >= this.slides.length) next = 0;
        if (--prev < 0) prev = this.slides.length - 1;

        // Preload the slide image
        this.slides[next].load();
        this.slides[prev].load();

        // Keep going until we have fetched
        // the designated number of slides

      } while (++count < this.prefetch);
    }
  }

  //--------------------------------------------------
  this.next = function() {
    // This method advances to the next slide.

    // Increment the image number
    if (this.current < this.slides.length - 1) {
      this.current++;
    } else if (this.repeat) {
      this.current = 0;
    }

    this.update();
  }


  //--------------------------------------------------
  this.previous = function() {
    // This method goes to the previous slide.
  
    // Decrement the image number
    if (this.current > 0) {
      this.current--;
    } else if (this.repeat) {
      this.current = this.slides.length - 1;
    }
  
    this.update();
  }

  //--------------------------------------------------
  this.get_text = function() {
    // This method returns the text of the current slide
  
    return(this.slides[ this.current ].text);
  }


  //--------------------------------------------------
  this.get_all_text = function(before_slide, after_slide) {
    // Return the text for all of the slides.
    // For the text of each slide, add "before_slide" in front of the
    // text, and "after_slide" after the text.
    // For example:
    // document.write("<ul>");
    // document.write(s.get_all_text("<li>","\n"));
    // document.write("<\/ul>");
  
    all_text = "";
  
    // Loop through all the slides in the slideshow
    for (i=0; i < this.slides.length; i++) {
  
      slide = this.slides[i];
    
      if (slide.text) {
        all_text += before_slide + slide.text + after_slide;
      }
  
    }
  
    return(all_text);
  }


  //--------------------------------------------------
  this.display_text = function(text) {
    // Display the text for the current slide
  
    // If the "text" arg was not supplied (usually it isn't),
    // get the text from the slideshow
    if (!text) {
      text = this.slides[ this.current ].text;
    }
  
    // If a textarea has been specified,
    // then change the text displayed in it
    if (this.textarea && typeof this.textarea.value != 'undefined') {
      this.textarea.value = text;
    }

    // If a text id has been specified,
    // then change the contents of the HTML element
    if (this.textid) {

      r = this.getElementById(this.textid);
      if (!r) { return false; }
      if (typeof r.innerHTML == 'undefined') { return false; }

      // Update the text
      r.innerHTML = text;
    }
  }

  //==================================================
  // Private methods
  //==================================================

  //--------------------------------------------------
  this.loop = function() {
    // This method is for internal use only.
    // This method gets called automatically by a JavaScript timeout.
    // It advances to the next slide, then sets the next timeout.
    // If the next slide image has not completed loading yet,
    // then do not advance to the next slide yet.

    // Make sure the next slide image has finished loading
    if (this.current < this.slides.length - 1) {
      next_slide = this.slides[this.current + 1];
      if (next_slide.image.complete == null || next_slide.image.complete) {
        this.next();
      }
    } else { // we're at the last slide
      this.next();
    }
    
    // Keep playing the slideshow
    this.play( );
  }


  //--------------------------------------------------
  this.valid_image = function() {
    // Returns 1 if a valid image has been set for the slideshow
  
    if (!this.image)
    {
      return false;
    }
    else {
      return true;
    }
  }

  //--------------------------------------------------
  this.getElementById = function(element_id) {
    // This method returns the element corresponding to the id

    if (document.getElementById) {
      return document.getElementById(element_id);
    }
    else if (document.all) {
      return document.all[element_id];
    }
    else if (document.layers) {
      return document.layers[element_id];
    } else {
      return undefined;
    }
  }
  
}
