# Pandoc

Pandoc is a universal document converter. With it, you can convert between various flavors of Markdown, Textile,
HTML, LaTeX and Word docx.

https://pandoc.org/MANUAL.html

## Examples

### Convert Markdown to Textile

```bash
pandoc --from markdown --to textile FileFrom.md -o FileTo.txt
```

### Convert Docx to Markdown

https://stackoverflow.com/questions/16383237/how-can-doc-docx-files-be-converted-to-markdown-or-structured-text

```bash
pandoc -f docx -t markdown foo.docx -o foo.markdown
```

### Batch convert a folder with pandoc

```bash
for i in *.docx; do echo "$i" && pandoc -f docx -t markdown $i -o $i.md; done
```
