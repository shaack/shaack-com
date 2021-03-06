# Pandoc

Pandoc is a universal document converter. With it, you can convert between various flavors of Markdown, Textile,
HTML, LaTeX and Word docx.

https://pandoc.org/MANUAL.html

## Install

    brew install pandoc

## Examples

### Convert Markdown to Textile

```bash
pandoc --from markdown --to textile FileFrom.md -o FileTo.txt
```

### Convert Word Docx to Markdown

https://stackoverflow.com/questions/16383237/how-can-doc-docx-files-be-converted-to-markdown-or-structured-text

```bash
pandoc -f docx -t markdown foo.docx -o foo.md
```

### Convert Markdown to Word Docx

```bash
pandoc -f markdown -t docx foo.md -o foo.docx
```

### Batch convert a folder with pandoc

```bash
for i in *.docx; do echo "$i" && pandoc -f docx -t markdown $i -o $i.md; done
```

