#!/bin/bash
exec su root --command 'export QT_QPA_PLATFORM=offscreen && export XDG_RUNTIME_DIR=/tmp/runtime-runner && python3 /disk3/default/V2/admin/core/BUSCO_phylogenomics/tree.py' 
