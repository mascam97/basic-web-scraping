import { RemoveHtmlCode, ClearInfo, ReplaceCharacters, DeleteWords } from '../js/filters';

describe('Remove HTML code', () => {
    test('delete css tags and its content', () => {
        expect(RemoveHtmlCode(
            `<style>
                p {font-size:10rem;}
            </style>
            <p>Content</p>
            `
        )).toBe('Content');
    });
    test('delete javascript tags and its content', () => {
        expect(RemoveHtmlCode(
            `<script>
                alert("hello world from javascript");
            </script>
            <p>Hello World from HTML</p>
            `
        )).toBe('Hello World from HTML');
    });
    test('delete opened and closed tags', () => {
        expect(RemoveHtmlCode(
            `<footer>
                    <img src="http://">
                    Visit my blog in <a href="http://">this link<a>.
                </footer>
                `
        )).toBe('Visit my blog in this link .');
    });
    test('delete more than 2 spaces and lines', () => {
        expect(RemoveHtmlCode(
            ` Welcome     to my 
            website     `
        )).toBe('Welcome to my website');
    });
});

describe('Clean information', () => {
    test('delete symbols', () => {
        expect(ClearInfo("Wanna contact them? Cellphone: +00 1234, let´s talk!!!!!!"))
            .toBe('wanna contact them cellphone 00 1234 let talk');
    });
    test('delete words with one or two words', () => {
        expect(ClearInfo("We are a company in Mexico to share good value"))
        .toBe('are company mexico share good value');
    });
});

describe('Replace characters', () => {
    test('replace characters by a normal one', () => {
        expect(ReplaceCharacters("âäàåá êëèé ïîìí ôöòóø üûùú ñ"))
            .toBe('aaaaa eeee iiii ooooo uuuu n');
    });
});

describe('Delete words', () => {
    test('Delete words in spanish', () => {
        // BUG: the first word is not deleted
        expect(DeleteWords("tenis tambien mejoran aquel rendimiento"))
            .toBe('tenis mejoran rendimiento');
    });
    test('Delete words in english', () => {
        expect(DeleteWords("improve your performance with these shoes"))
            .toBe('improve performance shoes');
    });
});
