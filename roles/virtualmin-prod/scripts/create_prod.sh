#!/bin/bash

virtualmin create-domain --domain prod.$(hostname -a) --pass 123456789 --ssl --default-features