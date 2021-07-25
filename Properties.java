
package HTTP.408.request;

import java.util.HashMap;
import java.util.Map;
import javax.annotation.Generated;
import com.fasterxml.jackson.annotation.JsonAnyGetter;
import com.fasterxml.jackson.annotation.JsonAnySetter;
import com.fasterxml.jackson.annotation.JsonIgnore;
import com.fasterxml.jackson.annotation.JsonInclude;
import com.fasterxml.jackson.annotation.JsonProperty;
import com.fasterxml.jackson.annotation.JsonPropertyOrder;

@JsonInclude(JsonInclude.Include.NON_NULL)
@JsonPropertyOrder({
    "foo",
    "bar",
    "baz"
})
@Generated("jsonschema2pojo")
public class Properties {

    @JsonProperty("foo")
    private Foo foo;
    @JsonProperty("bar")
    private Bar bar;
    @JsonProperty("baz")
    private Baz baz;
    @JsonIgnore
    private Map<String, Object> additionalProperties = new HashMap<String, Object>();

    @JsonProperty("foo")
    public Foo getFoo() {
        return foo;
    }

    @JsonProperty("foo")
    public void setFoo(Foo foo) {
        this.foo = foo;
    }

    @JsonProperty("bar")
    public Bar getBar() {
        return bar;
    }

    @JsonProperty("bar")
    public void setBar(Bar bar) {
        this.bar = bar;
    }

    @JsonProperty("baz")
    public Baz getBaz() {
        return baz;
    }

    @JsonProperty("baz")
    public void setBaz(Baz baz) {
        this.baz = baz;
    }

    @JsonAnyGetter
    public Map<String, Object> getAdditionalProperties() {
        return this.additionalProperties;
    }

    @JsonAnySetter
    public void setAdditionalProperty(String name, Object value) {
        this.additionalProperties.put(name, value);
    }

}
