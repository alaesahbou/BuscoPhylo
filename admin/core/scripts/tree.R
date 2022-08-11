library(phytools)
library(ggplot2)
library(ggtree)

tree <- ape::read.tree("RAxML_bipartitions.output_bootstrap.tre")
pdf(file="tree.pdf", width=20)
plotTree(tree)
nodelabels(tree$node.label,adj=c(1.6,-0.6))
dev.off()

tree <- ape::read.tree("RAxML_bipartitions.output_bootstrap.tre")
png("tree.png",
  width     = 1080,
  units     = "px")
plotTree(tree)
nodelabels(tree$node.label,adj=c(1.6,-0.6))
dev.off()