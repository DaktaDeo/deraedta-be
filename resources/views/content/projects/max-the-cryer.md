---
title: Max, the cryer
author: Ann Deraedt
type: post
date: 2021-07-31T13:53:22+00:00
url: /max-the-cryer/
categories:
  - Blog
tags:
  - home
  - digital office
  - project
  - open source
---
<small>Unraid, the manager for a bunch of hard discs.</small>

On the site of [Unraid](https://www.unraid.net/) you can read the definition: "Unraid OS allows sophisticated media aficionados, gamers, and other intensive data-users to have ultimate control over their data, media, applications, and desktops, using just about any combination of hardware."
If you compare to a RAID system, it has a great advantage: you can use all kind of different old disc with differents size or brand. 
You can reuse your old hardware, for me it means: it is a sustainable solution.

At home we named our old server - dated 2011 - "Max, the cryer". Because he is old, the fan is making a lot of noice 🔊. But we are happy, we reused an old [Supermicro](https://www.supermicro.com/en/home) server from 🏭 [Brugge Marine Center](https://bruggemarinecenter.com/nl/hallo/).

<content-image src="/img/max-the-cryer.jpg" alt="An old server put in the garage not to be disturbed by the fan noise."></content-image>

This server is our basic for the Office Automation. It is running some dockers. For me, a docker is a very tiny virtual machine for a dedicated service. More information about docker, you can read in the [FreeCodeCamp 'What is a Docker' article](https://www.freecodecamp.org/news/what-is-docker-used-for-a-docker-container-tutorial-for-beginners/).
Dockers that run on Max:
- [Odoo ERP](https://www.odoo.com/page/community): ERP community version for our home inventory. You need this for your fire insurance. Secund storage is for our hobby: electronic components and smd. Third category of information is software on CDs and DVDs.
- [Jriver media center](https://jriver.com/): All our audio CD's we put them in one personal storage to be easily accessed for our home audio. Additional, we added our photo albums here.
- [Calibre ebook management](https://calibre-ebook.com/): our magazines that we had on CD's and our e-books are managed in Calibre. At home we can read on smartphone, laptop or tablet.
- [Paperless-ng](https://hub.docker.com/r/linuxserver/paperless-ng): we bought a smart document scanner - [Fujitsu Scansnap](https://www.fujitsu.com/global/products/computing/peripheral/scanners/soho/ix1600/) - and together with Paperless-NG all documents are automatically converted to text (OCR). A second option is a smart categorising tool, based on a Machine Learning algortm.