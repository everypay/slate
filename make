#!/bin/bash
rake build;
cp -r build/* ~/public_html/everypay-frontend/public/api;
#firefox file:///home/mplexus/public_html/slate/build/index.html;
