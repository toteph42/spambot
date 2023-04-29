## SpamBot ##

Block access to your Web Site (singe pages or whole Internet presence) for spam robots. All IP or e-mail addresses are identified as **Spam** (suspicious access) or **Ham** (allowed access) based on **BlackList** or **WhiteList** or provider checks.

You may use one or more of the following providers

* **Intern**
Caching of testing results. Definition of **BlackList** or **WhiteList**.
* **[Spamhaus](https://www.spamhaus.org/)**
Testing IP address.
* **[Honeypot](https://www.projecthoneypot.org/)**
Testing IP address.
* **[StopForumSpam](http://www.stopforumspam.com)**
Testing IP and mail address.
* **[Spam and Open Relay Blocking System (SORBS)](http://www.sorbs.net)**
Testing IP address.
* **[SpamCop](https://www.spamcop.net/)**
Testing IP address.
* **[BlockList](http://www.blocklist.de)**
Testing IP address.
* **[NixSpam](http://www.dnsbl.manitu.net)**
Testing IP address.
* **[UCE Protect](http://www.uceprotect.net)**
Testing IP address (Level 1+2+3).
* **[Abusive Host Blocking List](https://www.ahbl.org)**
Testing IP address.
* **[Weighted Private Block List](http://www.wpbl.info)**
Testing IP address.
* **[BotScout](http://www.botscout.com)**
Testing IP and mail address.
* **[FSpamList](http://www.fspamlist.com)**
Testing IP and mail address.
* **[IPStack](https://ipstack.com/)**
Allow access for selected countries.

**Installation**

* Install Plugin
* Create a new **Frontend module** of typ **SpamBot-IP* *or **SpamBot-Mail**. Configure which provider should be used.
* Create a new page (optional) to which suspicious visitor should be redirected or check and update template **mod_spambot** according to your requirements (existing template supports German and English messages).
* Include module either in **Page layout** or on one or more pages as **Page element**.

**Usage**

* All visitor IP / mail addresses are checked and in case of suspicious visitor (**Spam**) either a message is displayed or visitor is redirected to a preselected page.
* Using a new menu option in BackEnd (in Account management) you can specify addition IP / mail addresses or regular expressions in **BlackList** or **WhiteList**.
* After checking the IP address, the following **InsertTags** are available in all templates:
  * `{{SpamBot::clientIP}}` IP address checked.
  * `{{SpamBot::Typ}}` Spam typ.
  * `{{SpamBot::Engine}}` Spam provider name (probably with link).
  * `{{SpamBot::Status}}` Status message.

**Specifics**

* Search engines were called in parallel. With this special solution operational capacity is enlarged dramatically.
* We recommend using modules only on page level.
  * Depending on which / how many provider you want to use latency time for displaying pages are extended. If you include module e.g. only on registration page and/or on contact page all other pages will be displayed faster.
  * If you use a Internet site with multi-language support you may define multiple Frontend modules with a a language specific redirection page.
  * With this plugin you may lock specific pages from being displayed (in your intranet) using the **BlackList** or allow only specific visitors to see these pages using **WhiteList**.
* You may use **SpamBot-Mail** in any form of your choice. Please don't forget to include modul at top of your page and in your Forms to configure the Inputfield E-Mail with the Configuration check for E-Mails.

**Testing**

* We highly recommend making any tests on a page not visible for other visitors or on a local copy of your Internet site (may bee you will lock or potential customers during testing :-).
* Allow logging of **Ham** IP / mail access.
* Open you prepared page in front end.
* Take a look at the IP / mail address in BackEnd.
* Check IP / mail address with configured provider and analyze result.
* Modify record and change type to **Spam**.
* Reload your modified page in browser and check results.

Please enjoy!

If you enjoy my software, I would be happy to receive a donation.

<a href="https://www.paypal.com/donate/?hosted_button_id=DS6VK49NAFHEQ" target="_blank" rel="noopener">
  <img src="https://www.paypalobjects.com/en_US/DK/i/btn/btn_donateCC_LG.gif" alt="Donate with PayPal"/>
</a>

