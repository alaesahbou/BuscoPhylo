import ete3
from ete3 import TextFace, Tree,faces, AttrFace, TreeStyle, NodeStyle
import sys
import glob


outName = "tree"

#read the file
#inputdire = sys.argv[1]
#outputName = 'example' # we can get that from user input
# read the tree files
t = Tree("RAxML_bipartitions.output_bootstrap.tre")

if len(sys.argv) > 1:
    outg = sys.argv[1]
    # set the outgroup, we can take that from user input, Dickeya_dadantii_3937 is an example
    if outg:
        t.set_outgroup(outg)


ts = TreeStyle()
ts.show_leaf_name = True
ts.show_branch_length = True
ts.show_branch_support = True
#ts.root_opening_factor = 1


# save the results as pdf
t.render(outName + ".pdf", w=2100, units="mm", tree_style=ts)

# save the results as png
t.render(outName + ".png", w=2100, units="mm", tree_style=ts)