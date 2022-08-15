import ete3
from ete3 import TextFace, Tree,faces, AttrFace, TreeStyle, NodeStyle
import sys
import glob


outName = "tree"

#read the file
#inputdire = sys.argv[1]
#outputName = 'example' # we can get that from user input
# read the tree files
t = Tree("SUPERMATRIX.aln.contree")

if len(sys.argv) > 1:
    outg = sys.argv[1]
    # set the outgroup, we can take that from user input, Dickeya_dadantii_3937 is an example
    if outg:
        t.set_outgroup(outg)



def layout(node):
    if node.is_leaf():
        N = AttrFace("name", fsize=8)
        faces.add_face_to_node(N, node, 0)
#        F = AttrFace("support", fsize=30)
#        faces.add_face_to_node(F, node, 0, position="branch-top")

ts = TreeStyle()

ts.layout_fn = layout
nstyle = NodeStyle()
nstyle["size"] = 0

ts.mode = "r"

for n in t.traverse():
   n.set_style(nstyle)

ts.show_leaf_name = False



ts.show_branch_length = True
ts.show_branch_support = True

# save the results as pdf
t.render(outName + ".pdf", tree_style=ts)

# save the results as png
t.render(outName + ".png", w=600, units="px", tree_style=ts)

# save the results as svg
t.render(outName + ".svg", w=600, units="px", tree_style=ts)



ts.show_branch_length = False
ts.show_branch_support = True

# save the results as pdf
t.render(outName + "_nolength.pdf", tree_style=ts)

# save the results as png
t.render(outName + "_nolength.png", w=600, units="px", tree_style=ts)

# save the results as svg
t.render(outName + "_nolength.svg", w=600, units="px", tree_style=ts)


ts.show_branch_length = True
ts.show_branch_support = False

# save the results as pdf
t.render(outName + "_nonode.pdf", tree_style=ts)

# save the results as png
t.render(outName + "_nonode.png", w=600, units="px", tree_style=ts)

# save the results as svg
t.render(outName + "_nonode.svg", w=600, units="px", tree_style=ts)


ts.show_branch_length = False
ts.show_branch_support = False

# save the results as pdf
t.render(outName + "_no.pdf", tree_style=ts)

# save the results as png
t.render(outName + "_no.png", w=600, units="px", tree_style=ts)

# save the results as svg
t.render(outName + "_no.svg", w=600, units="px", tree_style=ts)
