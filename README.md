# Chord Progression Reader

The goal of this project is to take my usual chickenscratch that I write while transcribing chord changes:

```
3/4
Dm | F/C | Bb | Am | Gm7 | Am | Bb | Csus9 C 

Dm | F/C | Bb | Am | Gm7 | Am | Dsus | D

Bb | Bm7 |    | C/D | Em(add9) | Eb | Dm | Gm7

Am | Bb |    | Asus | A7 | Bsus | B7

Em | Em/D | C | Bm | Am | G6 | F#m7 | B13 B(b13) 

Em9 | Dm7 G7 | C#m7(b5)
```

And output a pretty looking chord chart using [VexTab](https://github.com/0xfe/vextab).

## Dependencies

At the time of this writing, the chord chart parser is written in PHP 7 but I may switch to TypeScript in order to less clumsily integrate the VexTab API.